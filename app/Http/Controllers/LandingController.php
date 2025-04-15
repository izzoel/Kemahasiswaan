<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Pedoman;
use App\Models\Beasiswa;
use App\Models\Kategori;
use App\Models\Prestasi;
use App\Models\Konseling;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Exception\SessionNotFoundException;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $artikels = Artikel::paginate(2);
        $kategoris = Artikel::all();
        $pedomans = Pedoman::all();
        $informasi_terbaru = Artikel::orderBy('created_at', 'desc')->get();

        if ($request->ajax()) {
            return view('guest.section.section', compact('artikels', 'informasi_terbaru', 'kategoris', 'pedomans'))->render();
        }

        return view('guest.section.section', compact('artikels', 'informasi_terbaru', 'kategoris', 'pedomans'));
    }

    public function artikel($slug)
    {
        $artikels = Artikel::where('slug', $slug)->first();
        return view('guest.section.section', compact('artikels'));
    }

    public function kategori($kategori)
    {
        $kategoris = Kategori::where('kategori', $kategori)->first();
        $kategoris_all = Artikel::all();
        $artikels = Artikel::where('id_kategori', $kategoris->id)->get();
        return view('guest.section.section', compact('artikels', 'kategoris', 'kategoris_all'));
    }

    public function konseling_mahasiswa_select(Request $request)
    {
        $search = $request->input('search');
        $data = Mahasiswa::where('nama', 'like', "%$search%")
            ->orWhere('nim', 'like', "%$search%")
            ->get();
        return response()->json($data);
    }

    public function konseling_mahasiswa_store(Request $request)
    {
        try {
            Konseling::create([
                'nim' => $request->nama,
                'tanggal' => $request->tanggal,
                'hp' => $request->hp,
                'status' => 'baru',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => "Berhasil didaftarkan!",
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => "Gagal didaftarkan!"
            ], 500);
        }
    }

    public function beasiswa_akademik_select(Request $request)
    {
        $search = $request->input('search');
        $data = Mahasiswa::where('nama', 'like', "%$search%")
            ->orWhere('nim', 'like', "%$search%")
            ->get();
        return response()->json($data);
    }

    public function beasiswa_akademik_store(Request $request)
    {
        try {
            if ($request->hasFile('surat')) {
                $file = $request->file('surat');
                $filename = time() . '_' . $file->getClientOriginalName();

                $file->move(public_path('beasiswa/akademik'), $filename);
            } else {
                $filename = null;
            }

            Beasiswa::create([
                'nim' => $request->nama,
                'id_prestasi' => $request->prestasi,
                'beasiswa' => 'akademik',
                'surat' => $filename,
                'status' => 'pending',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data beasiswa berhasil disimpan.'
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan saat menyimpan data'], 500);
        }
    }

    public function beasiswa_nonakademik_select(Request $request)
    {
        $search = $request->input('search');

        // Ambil semua pasangan nim + id_prestasi dari tabel Beasiswa
        $usedPairs = Beasiswa::select('nim', 'id_prestasi')
            ->get()
            ->map(function ($item) {
                return $item->nim . '-' . $item->id_prestasi;
            })->toArray();

        // Ambil semua prestasi (dengan relasi mahasiswa)
        $data = Prestasi::with('mahasiswa')
            ->whereHas('mahasiswa', function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%")
                    ->orWhere('nim', 'like', "%$search%");
            })
            ->get()
            // Filter hanya yang belum ada di usedPairs
            ->filter(function ($item) use ($usedPairs) {
                $key = $item->nim . '-' . $item->id;
                return !in_array($key, $usedPairs);
            })
            // Kelompokkan berdasarkan nim
            ->groupBy('nim')
            ->map(function ($group) {
                $item = $group->first(); // Ambil satu prestasi dari setiap nim
                return [
                    'id' => $item->nim,
                    'nama' => optional($item->mahasiswa)->nama,
                    'nim' => $item->nim
                ];
            })
            ->values(); // Reset index array

        return response()->json($data);
    }

    public function beasiswa_nonakademik_store(Request $request)
    {
        try {
            Beasiswa::create([
                'nim' => $request->nama,
                'id_prestasi' => $request->prestasi,
                'beasiswa' => 'nonakademik',
                'status' => 'pending',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data beasiswa berhasil disimpan.'
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => "Gagal didaftarkan!"
            ], 500);
        }
    }

    public function prestasi_select(Request $request, $id)
    {
        // Ambil id_prestasi yang sudah dipakai oleh nim ini di tabel Beasiswa
        $usedPrestasi = Beasiswa::where('nim', $id)->pluck('id_prestasi');

        // Ambil prestasi yang sesuai dengan nim, dan belum dipakai di Beasiswa
        $data = Prestasi::where('nim', $id)
            ->whereNotIn('id', $usedPrestasi)
            ->get();

        return response()->json($data);
    }

    // $search = $request->input('search');
    // $data = Prestasi::where('nim', $id)->where('prestasi', 'like', "%$search%")
    //     ->orWhere('nim', 'like', "%$search%")
    //     ->get();
    // return response()->json($data);
    // $search = $request->input('search');

    // // Ambil semua ID prestasi yang sudah digunakan untuk nim tertentu
    // $usedPrestasiIds = Beasiswa::where('nim', $id)->pluck('id_prestasi')->toArray();

    // // Ambil data prestasi dari nim terkait, dan exclude yang sudah digunakan
    // $prestasi = Prestasi::where('nim', $id)
    //     ->whereNotIn('id', $usedPrestasiIds)
    //     ->when($search, function ($query, $search) {
    //         $query->where(function ($q) use ($search) {
    //             $q->where('prestasi', 'like', "%$search%")
    //                 ->orWhere('tingkat', 'like', "%$search%")
    //                 ->orWhere('tahun', 'like', "%$search%");
    //         });
    //     })
    //     ->get();

    // return response()->json($prestasi);
    // }

    public function prestasi_mahasiswa_select(Request $request)
    {
        $search = $request->input('search');
        $data = Mahasiswa::where('nama', 'like', "%$search%")
            ->orWhere('nim', 'like', "%$search%")
            ->get();
        return response()->json($data);
    }

    public function prestasi_mahasiswa_store(Request $request)
    {
        $nims = $request->nama;
        $prestasi = $request->prestasi ?? 'default';

        if ($request->hasFile('sertifikat')) {
            $file = $request->file('sertifikat');
            $sertifikat = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('prestasi/' . $prestasi . '/sertifikat/'), $sertifikat);
        } else {
            $sertifikat = null;
        }

        if ($request->hasFile('dokumentasi')) {
            $file = $request->file('dokumentasi');
            $dokumentasi = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('prestasi/' . $prestasi . '/dokumentasi/'), $dokumentasi);
        } else {
            $dokumentasi = null;
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $foto = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('prestasi/' . $prestasi . '/foto/'), $foto);
        } else {
            $foto = null;
        }

        try {
            foreach ($nims as $nim) {
                Prestasi::create([
                    'nim' => $nim,
                    'tahun' => $request->tahun,
                    'prestasi' => $request->prestasi,
                    'jenis' => $request->jenis,
                    'tingkat' => $request->tingkat,
                    'raihan' => $request->raihan,
                    'sertifikat' => $sertifikat,
                    'dokumentasi' => $dokumentasi,
                    'foto' => $foto
                ]);
            };

            return response()->json([
                'status' => 'success',
                'message' => "{$request->prestasi} berhasil didaftarkan!",
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => "{$request->prestasi} gagal didaftarkan!"
            ], 500);
        }
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['name' => $request->username, 'password' => $request->password]) || Auth::guard('organisasi')->attempt(['name' => $request->username, 'password' => $request->password])) {
            Session::put('username', $request->username);
            Session::put('password', $request->password);
            if (Auth::guard('organisasi')->check()) {
                Session::put('id', Auth::guard('organisasi')->id());
            }
            return response()->json(['success' => true, 'message' => 'Sukses']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal']);
        }
    }
    public function pedoman()
    {
        return view('guest.' . request()->segment(1) . '.' . request()->segment(2));
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('landing');
    }
}
