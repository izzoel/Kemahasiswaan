<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
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
            $kategori = Kategori::query();

            return DataTables::eloquent($kategori)
                ->addIndexColumn()
                ->addColumn('aksi', function ($kategori) {
                    return '<a type="button" class="U_B_kategori text-info" data-id="#M_U_kategori-' . $kategori->id . '">
                        <span class="tf-icons bx bx-edit"></span> Edit
                    </a>

                    <span class="mx-1">|</span>

                    <a type="button" class="D_B_kategori text-danger" data-id="' . $kategori->id . '">
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
        $kategori = Kategori::where('kategori', $request->S_kategori)->first();

        if ($kategori) {
            return response()->json([
                'status' => 'error',
                'message' => "Kategori {$request->S_kategori} sudah ada!"
            ], 400);
        }

        try {
            $kategori = Kategori::create([
                'kategori' => $request->S_kategori,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => "Kategori {$request->S_kategori} berhasil ditambahkan!",
                'id' => $kategori->id,
                'kategori' => $kategori->kategori
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => 'error',
                'message' => "Kategori {$request->S_kategori} gagal ditambahkan!"
            ], 500);
        }
    }

    public function show($id = null)
    {
        $query = Kategori::select('id', 'kategori')->distinct();

        if (!is_null($id)) {
            $query->where('id', $id);
        }

        $data = $query->orderBy('kategori', 'asc')->get();

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        try {
            $updateData = [
                'kategori' => $request->kategori,
            ];

            Kategori::findOrFail($id)->update($updateData);

            return redirect()->back()->with('success', "Kategori {$request->kategori}  berhasil diperbarui!");
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('fail', "Kategori {$request->kategori} gagal diperbarui!");
        }
    }

    public function destroy($id)
    {
        $kategori = Kategori::where('id', $id)->first();
        try {
            $kategori->delete();
            return redirect()->back()->with('success', "Kategori {$kategori->kategori} berhasil dihapus!");
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('fail', "Kategori {$kategori->kategori} gagal dihapus!");
        }
    }
}
