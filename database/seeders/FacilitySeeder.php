<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facility; // <--- TAMBAHKAN BARIS INI

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        // ... isi data tetap sama
        Facility::create(['name' => 'SDN 1 Kolakaasi', 'type' => 'Pendidikan', 'address' => 'Jl. Pendidikan No. 1']);
        Facility::create(['name' => 'Puskesmas Kolakaasi', 'type' => 'Kesehatan', 'address' => 'Jl. Sehat No. 5']);
        Facility::create(['name' => 'Masjid Al-Ikhlas', 'type' => 'Ibadah', 'address' => 'Jl. Damai No. 10']);
        Facility::create(['name' => 'Kantor Lurah Kolakaasi', 'type' => 'Pemerintahan', 'address' => 'Jl. Merdeka No. 100']);
    }
}