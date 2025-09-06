<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama surat, cth: Surat Keterangan Domisili
            $table->text('requirements'); // Syarat-syarat yang dibutuhkan
            $table->text('flow'); // Alur atau langkah-langkah pengurusan
            $table->string('duration')->nullable(); // Estimasi waktu, cth: 1 Hari Kerja
            $table->string('cost')->default('Gratis'); // Biaya
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
