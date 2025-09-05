<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        // Ambil semua data foto, urutkan dari yang terbaru
        $allPhotos = Gallery::latest()->paginate(12);

        // Kirim data ke view 'galeri'
        return view('galeri', [
            'allPhotos' => $allPhotos
        ]);
    }

    // === [TAMBAHKAN METHOD BARU INI] ===
    /**
     * Menampilkan satu foto dalam halaman detail.
     */
    public function show(Gallery $photo)
    {
        // Laravel akan secara otomatis menemukan data Gallery berdasarkan {photo} di URL.
        // Ini disebut "Route Model Binding".

        // Kirim data foto yang ditemukan ke view 'galeri-show'
        return view('galeri-show', [
            'photo' => $photo
        ]);
    }
}