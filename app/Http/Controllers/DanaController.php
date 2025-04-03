<?php

namespace App\Http\Controllers;

use App\Models\Dana;
use Illuminate\Http\Request;
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

    public function table()
    {
        if (request()->ajax()) {
            $dana = Dana::query();

            return DataTables::eloquent($dana)
                ->addIndexColumn()
                ->addColumn('anggaran', function ($dana) {
                    return 'Rp ' . number_format($dana->anggaran, 0, ',', '.');
                })
                ->addColumn('aksi', function ($dana) {
                    return '<a type="button" class="U_B_dana$dana text-info" data-id="#M_U_dana$dana-' . $dana->id . '">
                        <span class="tf-icons bx bx-edit"></span> Edit
                    </a>

                    <span class="mx-1">|</span>

                    <a type="button" class="D_B_dana$dana text-danger" data-id="' . $dana->id . '">
                        <span class="tf-icons bx bxs-x-square"></span>
                    </a>';
                })
                ->filterColumn('anggaran', function ($query, $keyword) {
                    $query->where('dana$danas.anggaran', 'like', "%{$keyword}%");
                })
                ->orderColumn('anggaran', 'dana$danas.anggaran $1')
                ->rawColumns(['anggaran', 'aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }
}
