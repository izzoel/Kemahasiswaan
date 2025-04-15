<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dana;
use App\Models\User;
use App\Models\Beasiswa;
use App\Models\Kegiatan;
use App\Models\Prestasi;
use App\Models\Konseling;
use App\Models\Organisasi;
use App\Models\Program;
use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)),
            'menuData' => $request->get('menuData')

        ];
        if (Auth::check()) {
            return view('layout.template', compact('data'));
        } else {
            return view('guest.landing');
        }
    }

    public function dashboard(Request $request)
    {
        $tahunOrganisasiTerbaru = Organisasi::max('periode');
        $tahunPrestasiTerbaru = Prestasi::max('tahun');
        $tahunBeasiswaTerbaru = Carbon::parse(Beasiswa::max('created_at'))->year;
        $tahunKonselingTerbaru = Carbon::parse(Konseling::max('created_at'))->year;

        $jenis = Prestasi::select('jenis')->distinct()->pluck('jenis')->toArray();

        $olahraga = Prestasi::where('tahun', $tahunPrestasiTerbaru)->where('jenis', 'olahraga')
            ->take(2)
            ->pluck('prestasi')
            ->toArray();
        $sains = Prestasi::where('tahun', $tahunPrestasiTerbaru)->where('jenis', 'sains')
            ->take(2)
            ->pluck('prestasi')
            ->toArray();
        $seni = Prestasi::where('tahun', $tahunPrestasiTerbaru)->where('jenis', 'seni')
            ->take(2)
            ->pluck('prestasi')
            ->toArray();
        $lainnya = Prestasi::where('tahun', $tahunPrestasiTerbaru)->where('jenis', 'lainnya')
            ->take(2)
            ->pluck('prestasi')
            ->toArray();
        $konseling_baru = Konseling::where('status', 'baru')->latest()->first();
        $konseling_selesai = Konseling::where('status', 'selesai')->latest()->first();

        $mahasiswaAkademik = Beasiswa::with('mahasiswa')
            ->whereYear('created_at', $tahunBeasiswaTerbaru)
            ->where('beasiswa', 'akademik')
            ->latest()
            ->first();

        $mahasiswaNonAkademik = Beasiswa::with('mahasiswa')
            ->whereYear('created_at', $tahunBeasiswaTerbaru)
            ->where('beasiswa', 'nonakademik')
            ->latest()
            ->first();

        if (Auth::guard('organisasi')->check()) {
            $struktur = Struktur::whereHas('organisasi', function ($query) use ($tahunOrganisasiTerbaru) {
                $query->where('id_organisasi', Auth::guard('organisasi')->user()->id)->where('periode', $tahunOrganisasiTerbaru);
            })->with(['organisasi', 'mahasiswa'])->get();
        } else {
            $struktur = Struktur::with(['organisasi', 'mahasiswa'])->get();
        }
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)),
            'menuData' => $request->get('menuData'),
            'tahun_beasiswa_sekarang' => $tahunBeasiswaTerbaru ?? '-',
            'tahun_prestasi_sekarang' => $tahunPrestasiTerbaru ?? '-',
            'tahun_konseling_sekarang' => $tahunKonselingTerbaru ?? '-',
            'olahraga' => $olahraga ?? [],
            'sains' => $sains ?? [],
            'seni' => $seni ?? [],
            'lainnya' => $lainnya ?? [],
            'konseling_baru' => optional($konseling_baru)->tanggal ?? '-',
            'konseling_selesai' => optional($konseling_selesai)->tanggal ?? '-',
            'nama_mahasiswa_akademik' => optional($mahasiswaAkademik?->mahasiswa)->nama
                ? optional($mahasiswaAkademik?->mahasiswa)->nama . " -- " .
                Carbon::parse(optional($mahasiswaAkademik?->mahasiswa)->updated_at)->translatedFormat('d F Y H:i')
                : '-',
            'nama_mahasiswa_nonakademik' => optional($mahasiswaNonAkademik?->mahasiswa)->nama
                ? optional($mahasiswaNonAkademik?->mahasiswa)->nama . " -- " .
                Carbon::parse(optional($mahasiswaNonAkademik?->mahasiswa)->updated_at)->translatedFormat('d F Y H:i')
                : '-',
            'organisasi' => Organisasi::where('periode', Organisasi::max('periode'))->get() ?? [],
            'struktur' => $struktur ?? [],
            'total_beasiswa' => Beasiswa::whereYear('created_at', $tahunBeasiswaTerbaru ?? now()->year)->count(),
            'total_beasiswa_akademik' => Beasiswa::whereYear('created_at', $tahunBeasiswaTerbaru ?? now()->year)->where('beasiswa', 'akademik')->count(),
            'total_beasiswa_nonakademik' => Beasiswa::whereYear('created_at', $tahunBeasiswaTerbaru ?? now()->year)->where('beasiswa', 'nonakademik')->count(),
            'total_prestasi' => Prestasi::where('tahun', Prestasi::max('tahun') ?? now()->year)->count(),
            'total_prestasi_olahraga' => Prestasi::where('tahun', $tahunPrestasiTerbaru ?? now()->year)->where('jenis', 'olahraga')->count(),
            'total_prestasi_sains' => Prestasi::where('tahun', $tahunPrestasiTerbaru ?? now()->year)->where('jenis', 'sains')->count(),
            'total_prestasi_seni' => Prestasi::where('tahun', $tahunPrestasiTerbaru ?? now()->year)->where('jenis', 'seni')->count(),
            'total_prestasi_lainnya' => Prestasi::where('tahun', $tahunPrestasiTerbaru ?? now()->year)->where('jenis', 'lainnya')->count(),
            'total_konseling' => Konseling::whereYear('created_at', $tahunKonselingTerbaru ?? now()->year)->count(),
            'total_konseling_baru' => Konseling::where('status', 'baru')->whereYear('created_at', $tahunKonselingTerbaru ?? now()->year)->count(),
            'total_konseling_selesai' => Konseling::where('status', 'selesai')->whereYear('created_at', $tahunKonselingTerbaru ?? now()->year)->count()
        ];

        return view('auth.' . request()->segment(1) . '.pages.section', compact('data'));
    }

    public function chart()
    {
        $tahunOrganisasiTerbaru = Organisasi::max('periode');
        $tahunPrestasiTerbaru = Prestasi::max('tahun');
        $tahunBeasiswaTerbaru = Carbon::parse(Beasiswa::max('created_at'))->year;
        $tahunKonselingTerbaru = Carbon::parse(Konseling::max('created_at'))->year;

        $jenisBeasiswa = Beasiswa::select('beasiswa')->distinct()->pluck('beasiswa')->toArray();
        $jenisPrestasi = Prestasi::select('jenis')->distinct()->pluck('jenis')->toArray();
        $statusKonseling = Konseling::select('status')->distinct()->pluck('status')->toArray();

        $jumlahBeasiswa = [];
        foreach ($jenisBeasiswa as $i) {
            $jumlahBeasiswa[] = Beasiswa::where('beasiswa', $i)
                ->whereYear('created_at', $tahunBeasiswaTerbaru)  // Memfilter berdasarkan tahun
                ->count();
        }

        $jumlahKonseling = [];
        foreach ($statusKonseling as $j) {
            $jumlahKonseling[] = Konseling::where('status', $j)
                ->whereYear('created_at', $tahunKonselingTerbaru)  // Memfilter berdasarkan tahun
                ->count();
        }

        $jumlahPrestasi = [];
        foreach ($jenisPrestasi as $k) {
            $jumlahPrestasi[] = Prestasi::where('jenis', $k)
                ->where('tahun', $tahunPrestasiTerbaru) // filter kalau mau hanya tahun terbaru
                ->count();
        }

        if (Auth::check()) {
            $updateKegiatan = Kegiatan::selectRaw('DATE(updated_at) as tanggal, COUNT(*) as jumlah')
                ->groupByRaw('DATE(updated_at)')
                ->orderBy('tanggal')
                ->get();

            $updateDana = Dana::selectRaw('DATE(updated_at) as tanggal, COUNT(*) as jumlah')
                ->groupByRaw('DATE(updated_at)')
                ->orderBy('tanggal')
                ->get();
            $totalOrganisasi = Organisasi::where('periode', Organisasi::max('periode'))->count();
        } elseif (Auth::guard('organisasi')->check()) {
            $updateKegiatan = Kegiatan::where('id_organisasi', Auth::guard('organisasi')->user()->id)->selectRaw('DATE(updated_at) as tanggal, COUNT(*) as jumlah')
                ->groupByRaw('DATE(updated_at)')
                ->orderBy('tanggal')
                ->get();

            $updateDana = Dana::where('id_organisasi', Auth::guard('organisasi')->user()->id)->selectRaw('DATE(updated_at) as tanggal, COUNT(*) as jumlah')
                ->groupByRaw('DATE(updated_at)')
                ->orderBy('tanggal')
                ->get();

            $totalOrganisasi = Program::whereHas('organisasi', function ($query) use ($tahunOrganisasiTerbaru) {
                $query->where('id_organisasi', Auth::guard('organisasi')->user()->id)->where('periode', $tahunOrganisasiTerbaru);
            })->with(['organisasi'])->count();
        }

        $statistik = [
            'update_kegiatan_tanggal' => $updateKegiatan?->pluck('tanggal') ?? collect(),
            'update_kegiatan' => $updateKegiatan?->pluck('jumlah') ?? collect(),
            'update_dana_tanggal' => $updateDana?->pluck('tanggal') ?? collect(),
            'update_dana' => $updateDana?->pluck('jumlah') ?? collect(),
            'tahun_beasiswa_sekarang' => $tahunBeasiswaTerbaru ?? '-',
            'tahun_prestasi_sekarang' => $tahunPrestasiTerbaru ?? '-',
            'tahun_konseling_sekarang' => $tahunKonselingTerbaru ?? '-',
            'jenis_beasiswa' => $jenisBeasiswa ?? [],
            'jumlah_beasiswa' => $jumlahBeasiswa ?? [],
            'jenis_prestasi' => $jenisPrestasi ?? [],
            'jumlah_prestasi' => $jumlahPrestasi ?? [],
            'status_konseling' => $statusKonseling ?? [],
            'jumlah_konseling' => $jumlahKonseling ?? [],
            'total_organisasi' => $totalOrganisasi ?? 0,
            'total_konseling' => Konseling::whereYear('created_at', $tahunKonselingTerbaru ?? now()->year)->count(),
            'total_beasiswa' => Beasiswa::whereYear('created_at', $tahunBeasiswaTerbaru ?? now()->year)->count(),
            'total_prestasi' => Prestasi::where('tahun', $tahunPrestasiTerbaru ?? now()->year)->count(),
        ];


        return response()->json($statistik);
    }

    public function profile(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)),
            'menuData' => $request->get('menuData')
        ];
        return view('auth.' . request()->segment(1) . '.pages.section', compact('data'));
    }

    public function picture(Request $request, $id)
    {
        if (Auth::check()) {
            $user = User::findOrFail($id);
        } elseif (Auth::guard('organisasi')->check()) {
            $user = Organisasi::findOrFail(Auth::guard('organisasi')->user()->id);
        }
        try {

            if ($request->hasFile('logo')) {
                if ($user->logo && File::exists(public_path("logo/{$user->logo}"))) {
                    File::delete(public_path("logo/{$user->logo}"));
                }

                $fileName = time() . '.' . $request->logo->getClientOriginalExtension();
                $request->logo->move(public_path('logo'), $fileName);

                $user->update([
                    'logo' => $fileName
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => "Foto berhasil diperbarui!",
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => "Tidak ada file yang diunggah!"
                ], 400);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => "Foto gagal diperbarui!"
            ], 500);
        }
    }

    public function password(Request $request, $id)
    {
        try {
            if (Auth::guard('organisasi')->check()) {
                $user = Organisasi::findOrFail($id);
            } else {
                $user = User::findOrFail($id);
            }

            if (Hash::check($request->password_lama, $user->password)) {
                if ($request->password_baru == $request->password_konfirmasi) {
                    $user->update([
                        'password' => Hash::make($request->password_baru)
                    ]);
                    return response()->json([
                        'status' => 'success',
                        'message' => "Password berhasil diperbarui!",
                    ]);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => "Password baru tidak sama!",
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => "Password lama salah!",
                ]);
            }
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => 'error',
                'message' => "Password gagal diperbarui!"
            ], 500);
        }
    }

    public function fetch()
    {
        $pendingBeasiswa = Beasiswa::where('status', 'pending')->get();
        $baruKonseling = Konseling::where('status', 'baru')->get();
        $baruDana = Dana::where('status', 'Ditinjau')->get();
        $baruKegiatan = Kegiatan::where('status', 'Ditinjau')->get();

        $jumlahNotif = $pendingBeasiswa->count() + $baruKonseling->count() + $baruDana->count() + $baruKegiatan->count();

        $html = view('partials.notifikasi', compact('pendingBeasiswa', 'baruKonseling', 'baruDana', 'baruKegiatan'))->render();

        return response()->json([
            'jumlah' => $jumlahNotif,
            'html' => $html
        ]);
    }
}
