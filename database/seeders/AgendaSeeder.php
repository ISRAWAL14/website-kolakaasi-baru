<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agenda; // <--- TAMBAHKAN BARIS INI

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        // ... isi data tetap sama
        Agenda::create(['title' => 'Rapat RT/RW', 'description' => 'Membahas keamanan lingkungan.', 'date' => '2025-08-15', 'time' => '19:30', 'location' => 'Balai Warga']);
        Agenda::create(['title' => 'Posyandu Balita', 'description' => 'Penimbangan dan imunisasi balita.', 'date' => '2025-08-20', 'time' => '09:00', 'location' => 'Puskesmas']);
    }
}