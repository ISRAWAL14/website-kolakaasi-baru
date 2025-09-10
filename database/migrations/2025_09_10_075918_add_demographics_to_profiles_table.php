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
        Schema::table('profiles', function (Blueprint $table) {
            // Menambahkan kolom baru di akhir tabel
            $table->string('luas_wilayah')->nullable();
            $table->integer('jumlah_rt')->default(0);
            $table->integer('jumlah_rw')->default(0);

            // Data Usia
            $table->integer('penduduk_anak')->default(0);
            $table->integer('penduduk_remaja')->default(0);
            $table->integer('penduduk_dewasa')->default(0);
            $table->integer('penduduk_lansia')->default(0);

            // Data Mata Pencaharian
            $table->integer('pencaharian_pns')->default(0);
            $table->integer('pencaharian_wiraswasta')->default(0);
            $table->integer('pencaharian_petani')->default(0);
            $table->integer('pencaharian_lainnya')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn([
                'luas_wilayah',
                'jumlah_rt',
                'jumlah_rw',
                'penduduk_anak',
                'penduduk_remaja',
                'penduduk_dewasa',
                'penduduk_lansia',
                'pencaharian_pns',
                'pencaharian_wiraswasta',
                'pencaharian_petani',
                'pencaharian_lainnya',
            ]);
        });
    }
};