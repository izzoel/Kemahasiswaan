<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->segment(1) == 'forpi') {
            $version = '3.0';
            $about = 'Formulir Pengajuan Surat Keterangan Pendamping Ijazah';
        } elseif ($request->segment(1) == 'dversi') {
            $version = '2.0';
            $about = 'Digital Verifikasi Biodata Ijazah';
        } else {
            $version = '3.0';
            $about = 'Sistem Persuratan';
        }

        // $notif = Lapor::where('status', 'baru')->where('menu', $request->segment(1))->count();


        $menuData = [
            'menu' => strtoupper($request->segment(1)),
            'logo' => Auth::user()->name ?? 'admin',
            'version' => $version,
            'about' => $about,
            'periode_lulus' => '2024/2025 Ganjil',
            // 'notif' => $notif
        ];

        if (Auth::check()) {
            if (Auth::user() !== null) {
                $menuData['description'] = strtoupper(Auth::user()->name);
                $menuData['segment2'] = strtoupper($request->segment(2)) ?? '';
            } else {
                if ($request->segment(1) == 'forpi') {
                    $menuData['description'] = $about;
                } elseif ($request->segment(1) == 'dversi') {
                    $menuData['description'] = $about;
                }
            }
        }

        $request->merge(['menuData' => $menuData]);

        return $next($request);
    }
}
