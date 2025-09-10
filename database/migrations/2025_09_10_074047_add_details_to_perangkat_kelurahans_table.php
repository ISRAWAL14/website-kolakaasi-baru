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
        Schema::table('perangkat_kelurahans', function (Blueprint $table) {
            // Menambahkan kolom untuk Tugas Pokok & Fungsi, setelah kolom 'foto'
            $table->text('tupoksi')->nullable()->after('foto');
            // Menambahkan kolom untuk Masa Jabatan, setelah kolom 'tupoksi'
            $table->string('masa_jabatan')->nullable()->after('tupoksi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perangkat_kelurahans', function (Blueprint $table) {
            // Perintah untuk menghapus kolom jika migrasi di-rollback
            $table->dropColumn(['tupoksi', 'masa_jabatan']);
        });
    }
};