<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)),
            'menuData' => $request->get('menuData')
        ];
        return view('auth.' . request()->segment(1) . '.pages.section', compact('data'));
    }

    public function table()
    {
        if (request()->ajax()) {
            $mahasiswa = Mahasiswa::query();

            return DataTables::eloquent($mahasiswa)
                ->addIndexColumn()
                ->addColumn('aksi', function ($mahasiswa) {
                    return '<a type="button" class="U_B_mahasiswa text-info" data-id="#M_U_mahasiswa-' . $mahasiswa->nim . '">
                        <span class="tf-icons bx bx-edit"></span> Edit
                    </a>

                    <span class="mx-1">|</span>

                    <a type="button" class="D_B_mahasiswa text-danger" data-id="' . $mahasiswa->nim . '">
                        <span class="tf-icons bx bxs-x-square"></span>
                    </a>';
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }

    public function store(Request $request)
    {
        try {
            $fakultas = match ($request->prodi) {
                'DIPLOMA TIGA FARMASI', 'D3 FARMASI' => 'Farmasi',
                'DIPLOMA TIGA ANALIS KESEHATAN', 'D3 ANALIS KESEHATAN' => 'Ilmu Kesehatan Dan Sains Teknologi',
                'SARJANA FARMASI', 'S1 FARMASI' => 'Farmasi',
                'SARJANA ADMINISTRASI RUMAH SAKIT', 'S1 ADMINISTRASI RUMAH SAKIT' => 'Ilmu Kesehatan Dan Sains Teknologi',
                'SARJANA GIZI', 'S1 GIZI' => 'Ilmu Kesehatan Dan Sains Teknologi',
                'SARJANA HUKUM', 'S1 HUKUM' => 'Ilmu Sosial Dan Humaniora',
                'SARJANA MANAJEMEN', 'S1 MANAJEMEN' => 'Ilmu Sosial Dan Humaniora',
                'SARJANA PENDIDIKAN GURU SEKOLAH DASAR', 'S1 PENDIDIKAN GURU SEKOLAH DASAR' => 'Ilmu Sosial Dan Humaniora',
                default => throw new \Exception("Data pada template salah"),
            };
            $gelar = match ($request->prodi) {
                'DIPLOMA TIGA FARMASI' => 'Ahli Madya Farmasi (A.Md.Farm.)',
                'DIPLOMA TIGA ANALIS KESEHATAN' => 'Ahli Madya Analis Kesehatan (A.Md.A.K.)',
                'SARJANA FARMASI' => 'Sarjana Farmasi (S.Farm.)',
                'SARJANA ADMINISTRASI RUMAH SAKIT' => 'Sarjana Kesehatan (S.Kes.)',
                'SARJANA GIZI' => 'Sarjana Gizi (S.Gz.)',
                'SARJANA HUKUM' => 'Sarjana Hukum (S.H.)',
                'SARJANA MANAJEMEN' => 'Sarjana Manajemen (S.M.)',
                'SARJANA PENDIDIKAN GURU SEKOLAH DASAR' => 'Sarjana Pendidikan (S.Pd.)',
                default => throw new \Exception("Data pada template salah"),
            };

            Mahasiswa::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'password' => Hash::make($request->nim),
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kelamin' => $request->kelamin,
                'fakultas' => $fakultas,
                'prodi' => strtoupper($request->prodi),
                'gelar' => $gelar,
                'foto' => rand(0, 11),
            ]);

            return redirect()->back()->with('success', 'Mahasiswa berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('fail', 'Gagal menambahkan mahasiswa!');
        }
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new MahasiswaImport, $request->file('file'));
            return back()->with('success', 'Data berhasil diimport!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('fail', 'Import Gagal!');
        }
    }

    public function show($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        return response()->json($mahasiswa);
    }
    public function select(Request $request)
    {
        $search = $request->input('search');
        $data = Mahasiswa::where('nama', 'like', "%$search%")
            ->orWhere('nim', 'like', "%$search%")
            ->get();
        return response()->json($data);
    }

    public function update(Request $request, $nim)
    {
        try {
            $updateData = [
                'nim' => $request->nim,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kelamin' => $request->kelamin,
                'prodi' => $request->prodi,
                'no_hp' => $request->hp,
                'alamat' => $request->alamat,
            ];

            if ($request->pisn) {
                $updateData['password'] = Hash::make($request->pisn);
            }

            Mahasiswa::where('nim', $nim)->update($updateData);

            return response()->json([
                'status' => 'success',
                'message' => "{$request->nama} berhasil diperbarui!",
            ]);
            // return redirect()->back()->with('success', "{$request->nama} berhasil diperbarui!");
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => "{$request->nama} gagal diperbarui!"
            ], 500);
            // return back()->with('fail', "{$request->nama} gagal diperbarui!");
        }
    }

    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        try {
            $mahasiswa->delete();
            return redirect()->back()->with('success', "{$mahasiswa->nama} berhasil dihapus!");
        } catch (\Exception $e) {
            return back()->with('fail', "{$mahasiswa->nama} gagal dihapus!");
        }
    }
}
