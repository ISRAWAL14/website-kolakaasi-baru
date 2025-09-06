<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        // Ambil semua fasilitas, lalu kelompokkan berdasarkan kolom 'type'
        $facilitiesByType = Facility::all()->groupBy('type');

        // Kirim data yang sudah dikelompokkan ke view
        return view('fasilitas', [
            'facilitiesByType' => $facilitiesByType
        ]);
    }
}