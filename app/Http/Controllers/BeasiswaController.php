<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class BeasiswaController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)),
            'menuData' => $request->get('menuData'),
        ];
        return view('auth.' . request()->segment(1) . '.pages.section', compact('data'));
    }

    public function table()
    {
        if (request()->ajax()) {
            $beasiswa = Beasiswa::query();

            return DataTables::eloquent($beasiswa)
                ->addIndexColumn()
                ->editColumn('nama', function ($beasiswa) {
                    return $beasiswa->mahasiswa ? $beasiswa->mahasiswa->nama : '-';
                })
                ->addColumn('aksi', function ($beasiswa) {
                    return '<a type="button" class="U_B_beasiswa text-info" data-id="#M_U_beasiswa-' .
                        $beasiswa->id .
                        '">
                        <span class="tf-icons bx bx-show"></span> Lihat
                    </a>

                    <span class="mx-1">|</span>

                    <a type="button" class="D_B_beasiswa text-danger" data-id="' .
                        $beasiswa->id .
                        '">
                        <span class="tf-icons bx bxs-x-square"></span>
                    </a>';
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }

    public function show($id)
    {
        $beasiswa = Beasiswa::with('mahasiswa', 'prestasi')->findOrFail($id);
        return response()->json($beasiswa);
    }

    public function update(Request $request, $id)
    {
        $beasiswa = Beasiswa::find($id);
        try {
            $beasiswa->status = $request->status;
            $beasiswa->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Status berhasil diperbarui!',
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Status gagal diperbarui!',
                ],
                500,
            );
        }
    }

    public function destroy($id)
    {
        $beasiswa = Beasiswa::where('id', $id)->first();
        try {
            $beasiswa->delete();
            return redirect()->back()->with('success', 'Data beasiswa berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('fail', 'Data beasiswa gagal dihapus!');
        }
    }
}
