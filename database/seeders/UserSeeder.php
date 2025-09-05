<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Kelurahan',
            'email' => 'admin@kolakaasi.com', // Disarankan menggunakan domain .com agar valid
            'password' => Hash::make('12345678'),
            'role' => 'ADMIN', // <-- INI BARIS YANG HILANG
        ]);
    }
}