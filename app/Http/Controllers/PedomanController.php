<?php

namespace App\Http\Controllers;

use App\Models\Pedoman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class PedomanController extends Controller
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
            $pedoman = Pedoman::query();

            return DataTables::eloquent($pedoman)
                ->addIndexColumn()
                ->addColumn('aksi', function ($pedoman) {
                    return '<a type="button" class="U_B_pedoman text-info" data-id="#M_U_pedoman-' . $pedoman->id . '">
                        <span class="tf-icons bx bx-edit"></span> Edit
                    </a>

                    <span class="mx-1">|</span>

                    <a type="button" class="D_B_pedoman text-danger" data-id="' . $pedoman->id . '">
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
        $pedoman = Pedoman::where('id', $request->id)->first();

        if ($pedoman) {
            return response()->json([
                'status' => 'error',
                'message' => "Pedoman sudah ada!"
            ], 400);
        }

        if ($request->hasFile('pedoman')) {
            $file = $request->file('pedoman');
            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('pedoman/pdf'), $filename);
        } else {
            $filename = null;
        }

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filecover = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('pedoman/cover'), $filecover);
        } else {
            $filecover = null;
        }


        try {
            Pedoman::create([
                'judul' => $request->judul,
                'pedoman' => $filename,
                'cover' => $filecover
            ]);

            return response()->json([
                'status' => 'success',
                'message' => "Pedoman berhasil ditambahkan!",
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => 'error',
                'message' => "Pedoman gagal ditambahkan!"
            ], 500);
        }
    }

    public function show($id)
    {
        $pedoman = Pedoman::where('id', $id)->first();
        return response()->json($pedoman);
    }

    public function update(Request $request, $id)
    {
        try {
            $pedoman = Pedoman::findOrFail($id);

            $updateData = [
                'judul' => $request->judul,
                'pedoman' => $pedoman->pedoman, // default pakai yang lama
                'cover' => $pedoman->cover,     // default pakai yang lama
            ];

            // Handle upload pedoman (PDF)
            if ($request->hasFile('pedoman')) {
                $file = $request->file('pedoman');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('pedoman/pdf'), $filename);

                // Hapus file lama jika ada
                if ($pedoman->pedoman && file_exists(public_path('pedoman/pdf/' . $pedoman->pedoman))) {
                    unlink(public_path('pedoman/pdf/' . $pedoman->pedoman));
                }

                $updateData['pedoman'] = $filename;
            }

            // Handle upload cover (gambar)
            if ($request->hasFile('cover')) {
                $file = $request->file('cover');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('pedoman/cover'), $filename);

                // Hapus cover lama jika ada
                if ($pedoman->cover && file_exists(public_path('pedoman/cover/' . $pedoman->cover))) {
                    unlink(public_path('pedoman/cover/' . $pedoman->cover));
                }

                $updateData['cover'] = $filename;
            }

            $pedoman->update($updateData);

            return response()->json([
                'status' => 'success',
                'message' => "Pedoman berhasil diperbarui!",
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => 'error',
                'message' => "Pedoman gagal diperbarui!"
            ], 500);
        }
    }

    public function destroy($id)
    {
        $pedoman = Pedoman::where('id', $id)->first();
        try {
            $pedoman->delete();
            return redirect()->back()->with('success', "Pedoman berhasil dihapus!");
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('fail', "Pedoman gagal dihapus!");
        }
    }
}
