<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement; // <--- TAMBAHKAN BARIS INI

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        // ... isi data tetap sama
        Announcement::create(['title' => 'Kerja Bakti Bulanan', 'content' => 'Diundang seluruh warga untuk mengikuti kerja bakti pada hari Minggu ini.']);
        Announcement::create(['title' => 'Penyaluran Bantuan Sosial', 'content' => 'Penyaluran bansos akan dilaksanakan di Kantor Lurah.']);
        Announcement::create(['title' => 'Program Vaksinasi COVID-19', 'content' => 'Jadwal vaksinasi booster tersedia di Puskesmas.']);
    }
}