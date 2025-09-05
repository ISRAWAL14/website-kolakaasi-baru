<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::create([
            'address' => 'Jl. Jenderal Ahmad Yani No. 1, Kel. Kolakaasi, Kec. Latambaga, Kota Kendari, Sulawesi Tenggara',
            'phone' => '(0401) 123456',
            'email' => 'kontak@kolakaasi.go.id',
            'google_maps_link' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.8764409590444!2d121.57765517473474!3d-4.045624195928114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d97f4df09e41195%3A0x5979a9fac80a68f5!2sKolakaasi%20Sub-District%20Office!5e0!3m2!1sen!2sid!4v1755844309740!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        ]);
    }
}