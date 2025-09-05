<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        Gallery::create(['caption' => 'Kegiatan Kerja Bakti Warga', 'image_url' => 'https://picsum.photos/seed/kegiatan1/400/300']);
        Gallery::create(['caption' => 'Pelaksanaan Posyandu Balita', 'image_url' => 'https://picsum.photos/seed/kegiatan2/400/300']);
        Gallery::create(['caption' => 'Rapat Koordinasi RT/RW', 'image_url' => 'https://picsum.photos/seed/kegiatan3/400/300']);
        Gallery::create(['caption' => 'Peringatan Hari Kemerdekaan', 'image_url' => 'https://picsum.photos/seed/kegiatan4/400/300']);
        Gallery::create(['caption' => 'Suasana Kantor Kelurahan', 'image_url' => 'https://picsum.photos/seed/kegiatan5/400/300']);
        Gallery::create(['caption' => 'Gotong Royong Membersihkan Saluran Air', 'image_url' => 'https://picsum.photos/seed/kegiatan6/400/300']);
    }
}