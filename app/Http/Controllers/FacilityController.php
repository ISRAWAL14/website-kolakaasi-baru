<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        // Ambil semua data fasilitas dari database
        $allFacilities = Facility::orderBy('type')->get();

        // Kirim data ke view 'fasilitas'
        return view('fasilitas', [
            'allFacilities' => $allFacilities
        ]);
    }
}