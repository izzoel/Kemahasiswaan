<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)),
            'menuData' => $request->get('menuData')

        ];
        if (Auth::check()) {
            return view('layout.template', compact('data'));
        }
        // elseif (Auth::guard('mahasiswa')->check()) {
        //     return redirect()->route('forpi_submit');
        // } 
        else {
            return view('guest.landing');
        }
    }

    public function dashboard(Request $request)
    {
        // dd('dashboard');
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)),
            'menuData' => $request->get('menuData')
        ];
        return view('auth.' . request()->segment(1) . '.pages.section', compact('data'));
    }
    public function profile(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)),
            'menuData' => $request->get('menuData')
        ];
        return view('auth.' . request()->segment(1) . '.pages.section', compact('data'));
    }

    public function picture(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            if ($request->hasFile('foto')) {
                if ($user->logo && File::exists(public_path("logo/{$user->logo}"))) {
                    File::delete(public_path("logo/{$user->logo}"));
                }

                $fileName = time() . '.' . $request->logo->getClientOriginalExtension();
                $request->logo->move(public_path('logo'), $fileName);

                $user->update([
                    'foto' => $fileName
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => "Foto berhasil diperbarui!",
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => "Tidak ada file yang diunggah!"
                ], 400);
            }
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => 'error',
                'message' => "Foto gagal diperbarui!"
            ], 500);
        }
    }

    public function password(Request $request, $id)
    {
        try {
            if (Auth::guard('organisasi')->check()) {
                $user = Organisasi::findOrFail($id);
            } else {
                $user = User::findOrFail($id);
            }

            if (Hash::check($request->password_lama, $user->password)) {
                if ($request->password_baru == $request->password_konfirmasi) {
                    $user->update([
                        'password' => Hash::make($request->password_baru)
                    ]);
                    return response()->json([
                        'status' => 'success',
                        'message' => "Password berhasil diperbarui!",
                    ]);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => "Password baru tidak sama!",
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => "Password lama salah!",
                ]);
            }
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => 'error',
                'message' => "Password gagal diperbarui!"
            ], 500);
        }
    }
}
