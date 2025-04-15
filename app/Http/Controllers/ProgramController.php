<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)),
            'menuData' => $request->get('menuData')
        ];
        return view('auth.' . request()->segment(1) . '.pages.section', compact('data'));
    }

    public function table($id = null)
    {
        if (request()->ajax()) {
            if (Auth::guard('organisasi')->check()) {
                $program = Program::with('organisasi')
                    ->where('id_organisasi', Auth::guard('organisasi')->id())
                    ->select('programs.*');
            } elseif (!is_null($id)) {
                $program = Program::with('organisasi')
                    ->where('id_organisasi', $id)
                    ->select('programs.*');
            } else {
                return DataTables::of(collect([]))->make(true);
            }

            return DataTables::eloquent($program)
                ->addIndexColumn()
                ->addColumn('anggaran', function ($program) {
                    return 'Rp ' . number_format($program->anggaran, 0, ',', '.');
                })
                ->addColumn('aksi', function ($program) { // Gunakan $program, bukan $struktur
                    if (Auth::guard('organisasi')->check()) {
                        return '<a type="button" class="U_B_program text-info" data-id="#M_U_program-' . $program->id . '">
                                <span class="tf-icons bx bx-edit"></span> Edit
                            </a>
                            <span class="mx-1">|</span>
                            <a type="button" class="D_B_program text-danger" data-id="' . $program->id . '">
                                <span class="tf-icons bx bxs-x-square"></span>
                            </a>';
                    }
                    return '-';
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }

    public function anggaran()
    {
        return response()->json([
            'anggaran' => auth('organisasi')->user()->anggaran ?? 0
        ]);
    }

    public function store(Request $request)
    {
        $organisasi = Organisasi::findOrFail(Auth::guard('organisasi')->id());
        try {
            Program::create([
                'id_organisasi' => Auth::guard('organisasi')->id(),
                'program' => $request->program,
                'pelaksanaan' => $request->pelaksanaan,
                'anggaran' => (int) str_replace(['Rp', '.', ','], '', $request->anggaran),
                'keterangan' => $request->keterangan
            ]);

            $organisasi->update([
                'anggaran' => (int) str_replace(['Rp', '.', ','], '', $organisasi->anggaran) - (int) str_replace(['Rp', '.', ','], '', $request->anggaran)
            ]);

            return response()->json([
                'status' => 'success',
                'message' => "{$request->program} berhasil ditambahkan!",
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => "{$request->program} gagal ditambahkan!"
            ], 500);
        }
    }

    public function show($id)
    {
        $program = Program::where('id', $id)->first();
        return response()->json($program);
    }

    public function update(Request $request, $id)
    {
        $organisasi = Organisasi::findOrFail(Auth::guard('organisasi')->id());

        try {
            $program = Program::findOrFail($id);

            // Ambil anggaran lama sebelum diupdate
            $oldAnggaran = (int) $program->anggaran;

            // Anggaran baru dari request
            $newAnggaran = (int) str_replace(['Rp', '.', ','], '', $request->anggaran);

            // Update data program
            $program->update([
                'program' => $request->program,
                'pelaksanaan' => $request->pelaksanaan,
                'anggaran' => $newAnggaran,
                'keterangan' => $request->keterangan,
            ]);

            // Update anggaran organisasi
            $currentAnggaran = (int) str_replace(['Rp', '.', ','], '', $organisasi->anggaran);
            $updatedAnggaran = $currentAnggaran + $oldAnggaran - $newAnggaran;

            $organisasi->update([
                'anggaran' => $updatedAnggaran
            ]);

            return response()->json([
                'status' => 'success',
                'message' => "{$request->program} berhasil diperbarui!"
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => "{$request->program} gagal diperbarui! Error: " . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $organisasi = Organisasi::findOrFail(Auth::guard('organisasi')->id());
        $program = Program::where('id', $id)->first();
        try {
            $organisasi->update([
                'anggaran' => (int) str_replace(['Rp', '.', ','], '', $organisasi->anggaran) + (int) str_replace(['Rp', '.', ','], '', $program->anggaran)
            ]);

            $program->delete();
            return redirect()->back()->with('success', "Program {$program->program} berhasil dihapus!");
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('fail', "Program {$program->program} gagal dihapus!");
        }
    }
}
