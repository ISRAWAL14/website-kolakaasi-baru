<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Facility;
use App\Models\Announcement;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua data yang dibutuhkan
        $profile = Profile::first();
        $facilities = Facility::all();
        $latestAnnouncements = Announcement::latest()->take(3)->get();
        $latestAgendas = Agenda::where('date', '>=', now())->orderBy('date', 'asc')->take(3)->get();

        // Kirim semua data ke view 'home'
        return view('home', [
            'profile' => $profile,
            'facilities' => $facilities,
            'announcements' => $latestAnnouncements,
            'agendas' => $latestAgendas,
            'Str' => Str::class,
            'Carbon' => Carbon::class,
        ]);
    }
        public function profilePage()
    {
        // Ambil data profil dari database
        $profile = Profile::first();

        // Kirim data ke view 'profile'
        return view('profile', [
            'profile' => $profile
        ]);
    }
}