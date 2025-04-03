<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
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

    public function table()
    {
        if (request()->ajax()) {
            $kegiatan = Kegiatan::query();

            return DataTables::eloquent($kegiatan)
                ->addIndexColumn()
                ->addColumn('anggaran', function ($kegiatan) {
                    return 'Rp ' . number_format($kegiatan->anggaran, 0, ',', '.');
                })
                ->addColumn('aksi', function ($kegiatan) {
                    return '<a type="button" class="U_B_kegiatan text-info" data-id="#M_U_kegiatan-' . $kegiatan->id . '">
                        <span class="tf-icons bx bx-edit"></span> Edit
                    </a>

                    <span class="mx-1">|</span>

                    <a type="button" class="D_B_kegiatan text-danger" data-id="' . $kegiatan->id . '">
                        <span class="tf-icons bx bxs-x-square"></span>
                    </a>';
                })
                ->filterColumn('anggaran', function ($query, $keyword) {
                    $query->where('kegiatans.anggaran', 'like', "%{$keyword}%");
                })
                ->orderColumn('anggaran', 'kegiatans.anggaran $1')
                ->rawColumns(['anggaran', 'aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }
}
