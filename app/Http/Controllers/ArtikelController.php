<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)),
            'menuData' => $request->get('menuData')
        ];
        return view('auth.' . request()->segment(1) . '.pages.section', compact('data'));
    }

    public function table(Request $request)
    {
        if ($request->ajax()) {
            $artikel = DB::table('artikels')
                ->leftJoin('kategoris', 'artikels.id_kategori', '=', 'kategoris.id')
                ->select([
                    'artikels.*',
                    'kategoris.kategori as kategori_nama',
                    DB::raw("DATE_FORMAT(artikels.created_at, '%d %M %Y %H:%i') as tanggal_format")
                ]);

            return DataTables::query($artikel)
                ->addIndexColumn()
                ->addColumn('judul', function ($row) {
                    return Str::limit($row->judul, 60, '...'); // Batasi judul hanya 200 karakter
                })
                ->addColumn('kategori', function ($row) {
                    return $row->kategori_nama ?? 'Tidak ada';
                })
                ->addColumn('tanggal', function ($row) {
                    return $row->tanggal_format;
                })
                ->addColumn('aksi', function ($row) {
                    return '<a type="button" class="U_B_artikel text-info" data-id="#M_U_artikel-' . $row->id . '">
                    <span class="tf-icons bx bx-edit"></span> Edit
                </a>

                <span class="mx-1">|</span>

                <a type="button" class="D_B_artikel text-danger" data-id="' . $row->id . '">
                    <span class="tf-icons bx bxs-x-square"></span>
                </a>';
                })
                ->rawColumns(['judul', 'kategori', 'tanggal', 'aksi'])
                ->make(true);
        }

        return view('auth.' . $request->segment(1) . '.pages.section');
    }

    public function store(Request $request)
    {
        try {
            $slug = $request->slug ?? Str::slug($request->judul);

            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('thumbnails'), $filename);

            Artikel::create([
                'judul' => $request->judul,
                'konten' => $request->konten,
                'slug' => $slug,
                'id_kategori' => $request->kategori,
                'thumbnail' => $filename
            ]);

            return redirect()->back()->with('success', 'Artikel berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'Artikel gagal ditambahkan!');
        }
    }

    public function show($id)
    {
        $artikel = Artikel::where('id', $id)->first();
        return response()->json($artikel);
    }

    public function update(Request $request, $id)
    {
        try {
            $slug = $request->slug ?? Str::slug($request->judul);

            $artikel = Artikel::findOrFail($id);

            $updateData = [
                'judul' => $request->judul,
                'konten' => $request->konten,
                'slug' => $slug,
                'id_kategori' => $request->kategori,
            ];

            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('thumbnails'), $filename);

                if ($artikel->thumbnail && file_exists(public_path('thumbnails/' . $artikel->thumbnail))) {
                    unlink(public_path('thumbnails/' . $artikel->thumbnail));
                }

                $updateData['thumbnail'] = $filename;
            }

            Artikel::where('id', $id)->update($updateData);

            return redirect()->back()->with('success', 'Artikel berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('fail', 'Artikel gagal diperbarui!');
        }
    }
}
