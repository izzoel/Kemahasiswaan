<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KategoriController extends Controller
{
    public function kategori(Request $request)
    {
        $kategori = Kategori::where('kategori', $request->S_kategori)->first();

        if ($kategori) {
            return response()->json([
                'status' => 'error',
                'message' => "Kategori {$request->S_kategori} sudah ada!"
            ], 400);
        }

        try {
            Kategori::create([
                'kategori' => $request->S_kategori,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => "Kategori {$request->S_kategori} berhasil ditambahkan!"
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => 'error',
                'message' => "Kategori {$request->S_kategori} gagal ditambahkan!"
            ], 500);
        }
    }

    public function show(Request $request)
    {
        $data = Kategori::select('id', 'kategori')->distinct()->get();
        return response()->json($data);
    }
}
