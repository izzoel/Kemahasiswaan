<?php

namespace App\Http\Controllers;

use App\Models\Konseling;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KonselingController extends Controller
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
            $konseling = Konseling::query();

            return DataTables::eloquent($konseling)
                ->addIndexColumn()
                ->editColumn('nama', function ($konseling) {
                    return $konseling->mahasiswa ? $konseling->mahasiswa->nama : '-';
                })
                ->addColumn('aksi', function ($konseling) {
                    $checked = $konseling->status === 'selesai' ? 'checked' : '';
                    return '<div class="form-switch">
            <input class="status-btn form-check-input" type="checkbox" data-id="' . $konseling->id . '" ' . $checked . '>
        </div>';
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }

    public function show($id)
    {
        $konseling = Konseling::with('mahasiswa')->findOrFail($id);
        return response()->json($konseling);
    }

    public function status(Request $request)
    {

        $konseling = Konseling::find($request->id);

        if ($konseling) {
            $konseling->status = $request->status ? 'selesai' : 'baru';
            $konseling->save();
            return response()->json(['success' => 'Status berhasil diperbarui!']);
        }

        return response()->json(['error' => 'Gagal memperbarui status.'], 400);
    }
}
