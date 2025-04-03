<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
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
                    'artikels.id',
                    'artikels.judul',
                    'kategoris.kategori as kategori_nama',
                    'artikels.created_at' // Gunakan format asli dari database untuk sorting
                ]);

            return DataTables::query($artikel)
                ->addIndexColumn()
                ->addColumn('judul', function ($row) {
                    return Str::limit($row->judul, 60, '...');
                })
                ->addColumn('kategori', function ($row) {
                    return $row->kategori_nama ?? '-- pilih --';
                })
                ->addColumn('tanggal', function ($row) {
                    return \Carbon\Carbon::parse($row->created_at)->translatedFormat('d F Y H:i');
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
                ->filterColumn('judul', function ($query, $keyword) {
                    $query->where('artikels.judul', 'like', "%{$keyword}%");
                })
                ->filterColumn('kategori', function ($query, $keyword) {
                    $query->where('kategoris.kategori', 'like', "%{$keyword}%");
                })
                ->filterColumn('tanggal', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(artikels.created_at, '%Y-%m-%d %H:%i') like ?", ["%{$keyword}%"]);
                })
                ->orderColumn('kategori', 'kategoris.kategori $1')
                ->orderColumn('tanggal', 'artikels.created_at $1')
                ->rawColumns(['judul', 'kategori', 'tanggal', 'aksi'])
                ->make(true);
        }

        return view('auth.' . $request->segment(1) . '.pages.section');
    }

    public function store(Request $request)
    {
        try {
            $slug = $request->slug ?? Str::slug($request->judul);

            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('thumbnails'), $filename);
            } else {
                $filename = null;
            }

            Artikel::create([
                'judul' => $request->judul,
                'konten' => $request->konten,
                'slug' => $slug,
                'id_kategori' => $request->filled('kategori') ? $request->kategori : '1',
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

    public function destroy($id)
    {
        $artikel = Artikel::where('id', $id)->first();
        try {
            $artikel->delete();
            return redirect()->back()->with('success', "Artikel {$artikel->judul} berhasil dihapus!");
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('fail', "Artikel {$artikel->judul} gagal dihapus!");
        }
    }
}
