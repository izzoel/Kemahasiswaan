<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class LandingController extends Controller
{
        public function index()
        {
                $artikels = Artikel::paginate(2);
                $informasi_terbaru = Artikel::orderBy('updated_at', 'desc')->get();

                $galeris = Galeri::orderBy('updated_at', 'desc')->take(4)->get();
                return view('landing', compact('artikels', 'informasi_terbaru', 'galeris'));
        }
        public function beasiswa()
        {
                // $beasiswas = Galeri::orderBy('updated_at', 'desc')->take(4)->get();
                // return view('beasiswa', compact('beasiswas'));
                return view('beasiswa');
        }
        public function prestasi()
        {
                $galeris = Galeri::orderBy('updated_at', 'desc')->take(4)->get();
                return view('prestasi', compact('galeris'));
        }
        public function galeri()
        {
                $galeris = Galeri::orderBy('updated_at', 'desc')->take(4)->get();
                return view('guest.galeries', compact('galeris'));
        }

        public function informasi()
        {
                return view('informasi');
        }
        public function pedoman()
        {
                return view('guest.pedoman');
        }
        public function pdf()
        {
                // $pathToFile = asset('a.pdf');
                // return response()->file($pathToFile, [
                //         'Content-Type' => 'application/pdf',
                //         'Content-Disposition' => 'inline; filename="a.pdf"',
                // ]);
                // dd('a');
                // asset('a.pdf');
                // dd(asset('web/viewer.html?file=pdf.pdf&magazineMode=true'));

                return redirect(url('web/viewer.html?file=a.pdf&magazineMode=true'));
                // return view(asset('web/viewer?file=pdf.pdf&magazineMode=true'));



                // // $filePath = storage_path('app/public/pdf.pdf');
                // $filePath = public_path('web/pdf.pdf');

                // // Check if the file exists
                // if (!file_exists($filePath)) {
                //         abort(404, 'File not found');
                // }


                // // Get the file content
                // $fileContent = file_get_contents($filePath);

                // // Get the mime type of the file
                // $mimeType = mime_content_type($filePath);

                // // Create a response with the file content and appropriate headers
                // return Response::make($fileContent, 200, [
                //         'Content-Type' => $mimeType,
                //         'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"',
                //         'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                //         'Pragma' => 'no-cache',
                //         'Expires' => 'Thu, 01 Jan 1970 00:00:00 GMT',
                // ]);
        }
}
