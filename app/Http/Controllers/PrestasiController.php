<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PrestasiController extends Controller
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
            $prestasi = Prestasi::query();

            return DataTables::eloquent($prestasi)
                ->addIndexColumn()
                ->editColumn('nama', function ($prestasi) {
                    return $prestasi->mahasiswa ? $prestasi->mahasiswa->nama : '-';
                })
                ->addColumn('aksi', function ($prestasi) {
                    return '<a type="button" class="U_B_prestasi text-info" data-id="#M_U_prestasi-' . $prestasi->id . '">
                        <span class="tf-icons bx bx-show"></span> Lihat
                    </a>

                    <span class="mx-1">|</span>

                    <a type="button" class="D_B_prestasi text-danger" data-id="' . $prestasi->id . '">
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
        $prestasi = Prestasi::with('mahasiswa')->findOrFail($id);
        return response()->json($prestasi);
    }
}
