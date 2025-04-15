<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class OrganisasiController extends Controller
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
            $organisasi = Organisasi::query();

            if (request()->filled('periode')) {
                $organisasi->where('periode', request('periode'));
            }

            return DataTables::eloquent($organisasi)
                ->addIndexColumn()
                ->addColumn('logo', function ($organisasi) {
                    return '<img src="' . asset('logo/' . $organisasi->logo) . '" alt="' . $organisasi->nama . '" class="img-fluid" width="100px" height="100px">';
                })
                ->addColumn('anggaran', function ($organisasi) {
                    return 'Rp ' . number_format($organisasi->anggaran, 0, ',', '.');
                })
                ->addColumn('aksi', function ($organisasi) {
                    return '<button class="P_B_organisasi btn btn-xs btn-primary" data-id="#M_P_organisasi-' . $organisasi->id . '">
                        <i class="bx bx-notepad"></i>
                    </button>
                   
                   <button class="V_B_organisasi btn btn-xs btn-primary" data-id="#M_V_organisasi-' . $organisasi->id . '">
                        <i class="bx bxs-user-detail"></i>
                    </button>

                    <span class="mx-1">|</span>
                    
                    <a type="button" class="U_B_organisasi text-info" data-id="#M_U_organisasi-' . $organisasi->id . '">
                        <span class="tf-icons bx bx-edit"></span> Edit
                    </a>

                    <span class="mx-1">|</span>

                    <a type="button" class="D_B_organisasi text-danger" data-id="' . $organisasi->id . '">
                        <span class="tf-icons bx bxs-x-square"></span>
                    </a>';
                })
                ->filterColumn('anggaran', function ($query, $keyword) {
                    $query->where('organisasis.anggaran', 'like', "%{$keyword}%");
                })
                ->orderColumn('anggaran', 'organisasis.anggaran $1')
                ->rawColumns(['logo', 'anggaran', 'aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }

    public function store(Request $request)
    {
        $organisasi = Organisasi::where('nama', $request->nama)->first();

        if ($organisasi) {
            if (Organisasi::where('nama', $request->nama)->where('periode', $request->periode)->exists()) {
                return response()->json([
                    'status' => 'error',
                    'message' => "Organisasi {$request->nama} periode {$request->periode} sudah ada!"
                ], 400);
            }
        }


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('logo'), $filename);
        } else {
            $filename = null;
        }

        try {
            Organisasi::create([
                'nama' => $request->nama,
                'logo' => $filename,
                'anggaran' => (int) str_replace(['Rp', '.', ','], '', $request->anggaran),
                'periode' => $request->periode,
                'keterangan' => $request->keterangan
            ]);

            return response()->json([
                'status' => 'success',
                'message' => "{$request->nama} berhasil ditambahkan!",
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => 'error',
                'message' => "{$request->nama} gagal ditambahkan!"
            ], 500);
        }
    }

    public function show($id)
    {
        $organisasi = Organisasi::where('id', $id)->first();
        return response()->json($organisasi);
    }

    public function periode()
    {
        $periode = Organisasi::select('periode')->distinct()->get();
        return response()->json($periode);
    }

    public function update(Request $request, $id)
    {
        try {
            $organisasi = Organisasi::findOrFail($id);

            // Cek apakah nama & periode sudah ada untuk organisasi lain
            $cekOrganisasi = Organisasi::where('nama', $request->nama)
                ->where('periode', $request->periode)
                ->where('id', '!=', $id) // Pastikan bukan dirinya sendiri
                ->exists();

            if ($cekOrganisasi) {
                return response()->json([
                    'status' => 'error',
                    'message' => "Organisasi {$request->nama} periode {$request->periode} sudah ada!"
                ], 400);
            }

            if ($request->name) {
                $cekUsername = Organisasi::where('name', $request->name)
                    ->where('id', '!=', $id) // Pastikan bukan dirinya sendiri
                    ->exists();

                if ($cekUsername) {
                    return response()->json([
                        'status' => 'error',
                        'message' => "Username {$request->name} sudah digunakan!"
                    ], 400);
                }
            }

            $updateData = [
                'nama' => $request->nama,
                'anggaran' => (int) str_replace(['Rp', '.', ','], '', $request->anggaran),
                'periode' => $request->periode,
                'keterangan' => $request->keterangan,
                'name' => $request->name ?? $organisasi->name,
                'password' => optional($request->password) ? Hash::make($request->password) : $organisasi->password
            ];

            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('logo'), $filename);

                if ($organisasi->logo && file_exists(public_path('logo/' . $organisasi->logo))) {
                    unlink(public_path('logo/' . $organisasi->logo));
                }

                $updateData['logo'] = $filename;
            }

            $organisasi->update($updateData);

            return response()->json([
                'status' => 'success',
                'message' => "{$request->nama} berhasil diperbarui!"
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => "{$request->nama} gagal diperbarui! Error: " . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $organisasi = Organisasi::where('id', $id)->first();
        try {
            $organisasi->delete();
            return redirect()->back()->with('success', "Organisasi {$organisasi->nama} berhasil dihapus!");
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('fail', "Organisasi {$organisasi->nama} gagal dihapus!");
        }
    }
}
