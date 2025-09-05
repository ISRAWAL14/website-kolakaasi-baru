<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('village_name')->default('Kelurahan Kolakaasi');
            $table->text('history');
            $table->text('vision');
            $table->text('mission');
            $table->string('north_boundary');
            $table->string('east_boundary');
            $table->string('south_boundary');
            $table->string('west_boundary');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};