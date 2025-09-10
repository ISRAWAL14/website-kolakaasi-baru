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
            // Menambahkan kolom 'foto' setelah kolom 'position'
            // nullable() berarti kolom ini boleh kosong (opsional)
            $table->string('foto')->nullable()->after('position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perangkat_kelurahans', function (Blueprint $table) {
            // Perintah untuk menghapus kolom jika migration di-rollback
            $table->dropColumn('foto');
        });
    }
};