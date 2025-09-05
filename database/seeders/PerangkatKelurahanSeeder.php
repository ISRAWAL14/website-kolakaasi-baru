<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PerangkatKelurahan;

class PerangkatKelurahanSeeder extends Seeder
{
    public function run(): void
    {
        PerangkatKelurahan::create([
            'name' => 'Budi Santoso, S.Sos',
            'position' => 'Lurah',
            'photo_url' => 'https://i.pravatar.cc/300?u=lurah'
        ]);

        PerangkatKelurahan::create([
            'name' => 'Siti Aminah, S.E.',
            'position' => 'Sekretaris Kelurahan',
            'photo_url' => 'https://i.pravatar.cc/300?u=sekretaris'
        ]);

        PerangkatKelurahan::create([
            'name' => 'Ahmad Dahlan',
            'position' => 'Kepala Seksi Pemerintahan',
            'photo_url' => 'https://i.pravatar.cc/300?u=kasi1'
        ]);

        PerangkatKelurahan::create([
            'name' => 'Dewi Lestari',
            'position' => 'Kepala Seksi Kesejahteraan',
            'photo_url' => 'https://i.pravatar.cc/300?u=kasi2'
        ]);
    }
}