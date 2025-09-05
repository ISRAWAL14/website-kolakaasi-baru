<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AgendaController extends Controller
{
    /**
     * Menampilkan halaman daftar agenda untuk pengunjung.
     */
    public function index()
    {
        // Ambil semua data agenda, urutkan dari yang terbaru
        $allAgendas = Agenda::latest()->paginate(5);

        // Kirim data ke view 'agenda' (halaman publik)
        return view('agenda', [
            'allAgendas' => $allAgendas,
            'Carbon' => Carbon::class,
        ]);
    }
}