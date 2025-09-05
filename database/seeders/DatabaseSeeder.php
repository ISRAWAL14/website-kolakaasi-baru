<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            FacilitySeeder::class,
            AnnouncementSeeder::class,
            AgendaSeeder::class,
            PerangkatKelurahanSeeder::class,
            GallerySeeder::class,
            ContactSeeder::class, 
        ]);
    }
}