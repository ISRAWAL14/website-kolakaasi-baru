<?php

namespace App\Http\Controllers;

use App\Models\PerangkatKelurahan;
use Illuminate\Http\Request;

class PerangkatController extends Controller
{
    /**
     * Menampilkan halaman daftar perangkat untuk pengunjung.
     */
    public function index()
    {
        // Ambil semua data perangkat dari database
        $allPerangkat = PerangkatKelurahan::all();

        // Kirim data ke view 'perangkat' (halaman publik)
        return view('perangkat', [
            'allPerangkat' => $allPerangkat
        ]);
    }
}