<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        dd('dashboard');
        // $data = [
        //     'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)),
        //     'menuData' => $request->get('menuData')
        // ];
        // return view('layout.template', compact('data'));
    }
}
