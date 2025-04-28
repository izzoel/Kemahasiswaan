<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use App\Models\Mahasiswa;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class StrukturController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)),
            'menuData' => $request->get('menuData')
        ];
        return view('auth.' . request()->segment(1) . '.pages.section', compact('data'));
    }

    public function table($id = null)
    {
        if (request()->ajax()) {
            if (Auth::guard('organisasi')->check()) {
                $struktur = Struktur::with('mahasiswa')
                    ->where('id_organisasi', Auth::guard('organisasi')->id())
                    ->select('strukturs.*');
            } elseif (!is_null($id)) {
                $struktur = Struktur::with('mahasiswa')
                    ->where('id_organisasi', $id)
                    ->select('strukturs.*');
            } else {
                // Jika $id null dan bukan organisasi, return data kosong
                return DataTables::of(collect([]))->make(true);
            }

            return DataTables::eloquent($struktur)
                ->addIndexColumn()
                ->editColumn('nim', function ($struktur) {
                    return $struktur->nim;
                })
                ->editColumn('nama', function ($struktur) {
                    return $struktur->mahasiswa ? $struktur->mahasiswa->nama : '-';
                })
                ->editColumn('prodi', function ($struktur) {
                    return $struktur->mahasiswa ? $struktur->mahasiswa->prodi : '-';
                })
                ->addColumn('profil', function ($struktur) {
                    $profilPath = $struktur->profil ? asset('profil/' . ($struktur->organisasi->nama ?? 'default') . '/' . $struktur->profil) : asset('img/default-profile.png');
                    return '<img src="' . $profilPath . '" alt="' . ($struktur->mahasiswa->nama ?? 'Profile') . '" class="img-fluid" width="100px" height="100px">';
                })
                ->addColumn('aksi', function ($struktur) {
                    if (Auth::guard('organisasi')->check()) {
                        return '<a type="button" class="U_B_struktur text-info" data-id="#M_U_struktur-' . $struktur->id . '">
                                <span class="tf-icons bx bx-edit"></span> Edit
                            </a>
                            <span class="mx-1">|</span>
                            <a type="button" class="D_B_struktur text-danger" data-id="' . $struktur->id . '">
                                <span class="tf-icons bx bxs-x-square"></span>
                            </a>';
                    }
                    return '-';
                })
                ->rawColumns(['profil', 'aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }

    public function store(Request $request)
    {
        $struktur = Struktur::where('nim', $request->nim)->first();
        $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();

        if ($struktur) {
            return response()->json([
                'status' => 'error',
                'message' => "Kategori {$struktur->mahasiswa->nama} sudah ada!"
            ], 400);
        }

        if ($request->hasFile('profil')) {
            $file = $request->file('profil');
            $filename = time() . '_' . $file->getClientOriginalName();

            $namaOrganisasi = Auth::guard('organisasi')->user()->nama ?? 'default';

            $file->move(public_path('profil/' . $namaOrganisasi), $filename);
        } else {
            $filename = null;
        }


        try {
            Struktur::create([
                'id_organisasi' => Auth::guard('organisasi')->id(),
                'nim' => $request->nim,
                'jabatan' => $request->jabatan,
                'profil' => $filename
            ]);

            return response()->json([
                'status' => 'success',
                'message' => "{$mahasiswa->nama} berhasil ditambahkan!",
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => 'error',
                'message' => "{$mahasiswa->nama} gagal ditambahkan!"
            ], 500);
        }
    }

    public function show($id)
    {
        $struktur = Struktur::where('id', $id)->first();
        return response()->json([
            'nim' => $struktur->nim,
            'jabatan' => $struktur->jabatan,
            'profil' => $struktur->profil,
            'nama_mahasiswa' => $struktur->mahasiswa ? preg_replace('/[^A-Za-z0-9_-]/', ' ', $struktur->mahasiswa->nama) : null,
            'nama_organisasi' => $struktur->organisasi ? preg_replace('/[^A-Za-z0-9_-]/', ' ', $struktur->organisasi->nama) : null,
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $struktur = Struktur::findOrFail($id);
            $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();

            $updateData = [
                'nim' => $request->nim,
                'jabatan' => $request->jabatan,
            ];

            if ($request->hasFile('profil')) {
                $file = $request->file('profil');
                $filename = time() . '_' . $file->getClientOriginalName();

                $namaOrganisasi = Auth::guard('organisasi')->user()->nama ?? 'default';

                $file->move(public_path('profil/' . $namaOrganisasi), $filename);


                if ($struktur->profil && file_exists(public_path('profil/' . $namaOrganisasi . '/' . $struktur->profil))) {
                    unlink(public_path('profil/' . $namaOrganisasi . '/' . $struktur->profil));
                }

                $updateData['profil'] = $filename;
            }

            Struktur::where('id', $id)->update($updateData);

            return response()->json([
                'status' => 'success',
                'message' => "{$mahasiswa->nama} berhasil diperbarui!",
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => 'error',
                'message' => "{$mahasiswa->nama} gagal diperbarui!"
            ], 500);
        }
    }

    public function destroy($id)
    {
        $struktur = Struktur::where('id', $id)->first();
        try {
            $struktur->delete();
            return redirect()->back()->with('success', "Struktur {$struktur->nama} berhasil dihapus!");
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('fail', "Struktur {$struktur->nama} gagal dihapus!");
        }
    }
}
