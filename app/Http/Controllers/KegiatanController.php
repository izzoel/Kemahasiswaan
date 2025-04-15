<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KegiatanController extends Controller
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
                $kegiatan = Kegiatan::with('organisasi')
                    ->where('id_organisasi', Auth::guard('organisasi')->id())
                    ->select('kegiatans.*');
            } elseif (!is_null($id)) {
                $kegiatan = Kegiatan::with('organisasi')
                    ->where('id_organisasi', $id)
                    ->select('kegiatans.*');
            } else {
                $kegiatan = Kegiatan::query();
            }

            $datatables = DataTables::eloquent($kegiatan)
                ->addIndexColumn()
                ->addColumn('anggaran', function ($kegiatan) {
                    return 'Rp ' . number_format($kegiatan->anggaran, 0, ',', '.');
                })
                ->addColumn('aksi', function ($kegiatan) {
                    if (Auth::guard('organisasi')->check()) {
                        return '<a type="button" class="U_B_kegiatan text-info" data-id="#M_U_kegiatan-' . $kegiatan->id . '">
                        <span class="tf-icons bx bx-edit"></span> Edit
                    </a>
                    <span class="mx-1">|</span>
                    <a type="button" class="D_B_kegiatan text-danger" data-id="' . $kegiatan->id . '">
                        <span class="tf-icons bx bxs-x-square"></span>
                    </a>';
                    }
                    return '<a type="button" class="U_B_kegiatan text-info" data-id="#M_U_kegiatan-' . $kegiatan->id . '">
                        <span class="tf-icons bx bx-edit"></span> Edit
                    </a>';
                });

            if (!Auth::guard('organisasi')->check()) {
                $datatables->addColumn('organisasi', function ($kegiatan) {
                    return $kegiatan->organisasi ? $kegiatan->organisasi->nama : '-';
                });
            }
            return $datatables
                ->filterColumn('anggaran', function ($query, $keyword) {
                    $query->where('kegiatans.anggaran', 'like', "%{$keyword}%");
                })
                ->orderColumn('anggaran', 'kegiatans.anggaran $1')
                ->rawColumns(['anggaran', 'aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }

    public function store(Request $request)
    {
        try {
            if ($request->hasFile('proposal')) {
                $file = $request->file('proposal');
                $filename = time() . '_' . $file->getClientOriginalName();

                $namaOrganisasi = Auth::guard('organisasi')->user()->nama ?? 'default';

                $file->move(public_path('kegiatan/proposal/' . $namaOrganisasi), $filename);
            } else {
                $filename = null;
            }

            Kegiatan::create([
                'id_organisasi' => Auth::guard('organisasi')->id(),
                'kegiatan' => $request->kegiatan,
                'pelaksanaan' => $request->pelaksanaan,
                'anggaran' => (int) str_replace(['Rp', '.', ','], '', $request->anggaran),
                'proposal' => $filename,
                'status' => 'Ditinjau',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => "Kegiatan berhasil ditambahkan!",
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => "Kegiatan gagal ditambahkan!"
            ], 500);
        }
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::with('organisasi')->where('id', $id)->first();
        return response()->json($kegiatan);
    }

    public function select($id)
    {
        $kegiatan = Kegiatan::with('organisasi')->where('id_organisasi', $id)->get();
        return response()->json($kegiatan);
    }

    public function update(Request $request, $id)
    {
        try {
            $kegiatan = Kegiatan::findOrFail($id);

            if (Auth::guard('organisasi')->check()) {
                $updateData = [
                    'kegiatan' => $request->kegiatan,
                    'pelaksanaan' => $request->pelaksanaan,
                    'anggaran' => (int) str_replace(['Rp', '.', ','], '', $request->anggaran),
                    'status' => 'Ditinjau',
                ];

                if ($request->hasFile('proposal')) {
                    $file = $request->file('proposal');
                    $filename = time() . '_' . $file->getClientOriginalName();

                    $namaOrganisasi = Auth::guard('organisasi')->user()->nama ?? 'default';

                    $file->move(public_path('kegiatan/proposal/' . $namaOrganisasi), $filename);


                    if ($kegiatan->proposal && file_exists(public_path('proposal/' . $namaOrganisasi . '/' . $kegiatan->proposal))) {
                        unlink(public_path('kegiatan/proposal/' . $namaOrganisasi . '/' . $kegiatan->proposal));
                    }

                    $updateData['proposal'] = $filename;
                }
            } else {
                $updateData = [
                    'status' => $request->status,
                ];
            }

            // Update data program
            $kegiatan->update($updateData);

            return response()->json([
                'status' => 'success',
                'message' => "Kegiatan berhasil diperbarui!"
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage()); // Logging error lebih jelas
            return response()->json([
                'status' => 'error',
                'message' => "Kegiatan gagal diperbarui! Error: " . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $program = Kegiatan::where('id', $id)->first();
        try {
            $program->delete();
            return redirect()->back()->with('success', "Kegiatan {$program->program} berhasil dihapus!");
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('fail', "Kegiatan {$program->program} gagal dihapus!");
        }
    }
}
