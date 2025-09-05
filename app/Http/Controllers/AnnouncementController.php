<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AnnouncementController extends Controller
{
    public function index()
    {
        // Ambil semua data pengumuman, urutkan dari yang terbaru
        $allAnnouncements = Announcement::latest()->paginate(5); // Kita pakai paginate agar ada halaman 1, 2, 3

        // Kirim data ke view 'pengumuman'
        return view('pengumuman', [
            'allAnnouncements' => $allAnnouncements,
            'Carbon' => Carbon::class,
        ]);
    }
}