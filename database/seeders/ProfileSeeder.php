<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile; // <--- TAMBAHKAN BARIS INI

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            // ... isi data tetap sama
            'history' => 'Sejarah singkat Kelurahan Kolakaasi yang berawal dari sebuah desa kecil dan berkembang menjadi pusat komunitas yang dinamis.',
            'vision' => 'Menjadi kelurahan yang maju, mandiri, sejahtera, dan berbudaya berlandaskan iman dan taqwa.',
            'mission' => "1. Meningkatkan kualitas sumber daya manusia.\n2. Mengembangkan perekonomian masyarakat.\n3. Meningkatkan infrastruktur kelurahan.",
            'north_boundary' => 'Kecamatan Wolio',
            'east_boundary' => 'Kelurahan Batulo',
            'south_boundary' => 'Selat Buton',
            'west_boundary' => 'Kelurahan Sulaa',
        ]);
    }
}