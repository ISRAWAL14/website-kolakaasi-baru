<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Menampilkan halaman utama galeri yang berisi daftar album.
     */
    public function index()
    {
        // Ambil semua album, beserta foto pertamanya sebagai thumbnail
        $albums = Album::with('photos')->latest()->get();
        return view('galeri', compact('albums'));
    }

    /**
     * Menampilkan halaman detail yang berisi semua foto dari satu album.
     */
    public function show(Album $album)
    {
        // Load relasi foto untuk album yang dipilih
        $album->load('photos');
        return view('galeri-show', compact('album'));
    }
}
