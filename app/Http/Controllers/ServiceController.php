<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // Ambil semua data layanan, urutkan dari yang terbaru
        $services = Service::latest()->get();

        // Kirim data ke view 'layanan.blade.php'
        return view('layanan', compact('services'));
    }
}
