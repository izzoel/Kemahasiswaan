<?php

namespace App\Http\Controllers;

use App\Models\Dana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DanaController extends Controller
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
            // $dana = Dana::query();
            if (Auth::guard('organisasi')->check()) {
                $dana = Dana::with('organisasi')
                    ->where('id_organisasi', Auth::guard('organisasi')->id())
                    ->select('danas.*');
            } elseif (!is_null($id)) {
                $dana = Dana::with('organisasi')
                    ->where('id_organisasi', $id)
                    ->select('danas.*');
            } else {
                $dana = Dana::query();
            }

            $datatables = DataTables::eloquent($dana)
                ->addIndexColumn()
                ->editColumn('kegiatan', function ($dana) {
                    return $dana->kegiatan ? $dana->kegiatan->kegiatan : '-';
                })
                ->editColumn('pelaksanaan', function ($dana) {
                    return $dana->kegiatan ? $dana->kegiatan->pelaksanaan : '-';
                })
                ->addColumn('dana', function ($dana) {
                    return 'Rp ' . number_format($dana->dana, 0, ',', '.');
                })
                ->addColumn('aksi', function ($dana) {
                    if (Auth::guard('organisasi')->check()) {
                        return '<a type="button" class="U_B_dana text-info" data-id="#M_U_dana-' . $dana->id . '">
                        <span class="tf-icons bx bx-edit"></span> Edit
                    </a>
                    <span class="mx-1">|</span>
                    <a type="button" class="D_B_dana text-danger" data-id="' . $dana->id . '">
                        <span class="tf-icons bx bxs-x-square"></span>
                    </a>';
                    }
                    return '<a type="button" class="U_B_dana text-info" data-id="#M_U_dana-' . $dana->id . '">
                        <span class="tf-icons bx bx-edit"></span> Edit
                    </a>';
                });

            if (!Auth::guard('organisasi')->check()) {
                $datatables->addColumn('organisasi', function ($kegiatan) {
                    return $kegiatan->organisasi ? $kegiatan->organisasi->nama : '-';
                });
            }
            return $datatables
                ->filterColumn('dana', function ($query, $keyword) {
                    $query->where('danas.dana', 'like', "%{$keyword}%");
                })
                ->orderColumn('dana', 'danas.dana $1')
                ->rawColumns(['dana', 'aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }

    public function store(Request $request)
    {
        try {
            if ($request->hasFile('berkas')) {
                $file = $request->file('berkas');
                $filename = time() . '_' . $file->getClientOriginalName();

                $namaOrganisasi = Auth::guard('organisasi')->user()->nama ?? 'default';

                $file->move(public_path('dana/berkas/' . $namaOrganisasi), $filename);
            } else {
                $filename = null;
            }

            Dana::create([
                'id_organisasi' => Auth::guard('organisasi')->id(),
                'id_kegiatan' => $request->kegiatan,
                'dana' => (int) str_replace(['Rp', '.', ','], '', $request->dana),
                'berkas' => $filename,
                'status' => 'Ditinjau',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => "Keperluan dana berhasil ditambahkan!",
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => "Keperluan dana gagal ditambahkan!"
            ], 500);
        }
    }

    public function show($id)
    {
        $dana = Dana::where('id', $id)->first();
        return response()->json([
            'id_organisasi' => $dana->id_organisasi,
            'id_kegiatan' => $dana->id_kegiatan,
            'dana' => $dana->dana,
            'berkas' => $dana->berkas,
            'nama_organisasi' => $dana->organisasi ? preg_replace('/[^A-Za-z0-9_-]/', ' ', $dana->organisasi->nama) : null,
            'nama_kegiatan' => $dana->kegiatan ? preg_replace('/[^A-Za-z0-9_-]/', ' ', $dana->kegiatan->kegiatan) : null,
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $dana = Dana::findOrFail($id);

            if (Auth::guard('organisasi')->check()) {
                $updateData = [
                    'id_kegiatan' => $request->kegiatan,
                    'dana' => (int) str_replace(['Rp', '.', ','], '', $request->dana),
                    'status' => 'Ditinjau',
                ];

                if ($request->hasFile('berkas')) {
                    $file = $request->file('berkas');
                    $filename = time() . '_' . $file->getClientOriginalName();

                    $namaOrganisasi = Auth::guard('organisasi')->user()->nama ?? 'default';

                    $file->move(public_path('dana/berkas/' . $namaOrganisasi), $filename);


                    if ($dana->berkas && file_exists(public_path('berkas/' . $namaOrganisasi . '/' . $dana->berkas))) {
                        unlink(public_path('dana/berkas/' . $namaOrganisasi . '/' . $dana->berkas));
                    }

                    $updateData['berkas'] = $filename;
                }
            } else {
                $updateData = [
                    'status' => $request->status,
                ];
            }

            $dana->update($updateData);

            return response()->json([
                'status' => 'success',
                'message' => "{$request->program} berhasil diperbarui!"
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => "{$request->program} gagal diperbarui! Error: " . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $dana = Dana::where('id', $id)->first();
        try {
            $dana->delete();
            return redirect()->back()->with('success', "Keperluan dana berhasil dihapus!");
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('fail', "Keperluan dana gagal dihapus!");
        }
    }
}
