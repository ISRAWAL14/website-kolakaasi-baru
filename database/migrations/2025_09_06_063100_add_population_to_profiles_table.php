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
            $table->integer('population_total')->default(0)->after('mission');
            $table->integer('population_male')->default(0)->after('population_total');
            $table->integer('population_female')->default(0)->after('population_male');
            $table->integer('household_count')->default(0)->after('population_female');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['population_total', 'population_male', 'population_female', 'household_count']);
        });
    }
};