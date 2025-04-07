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
        Schema::table('p_project_income_classes', function (Blueprint $table) {
            $table->string('color')->nullable();
        });
        Schema::table('p_project_energy_classes', function (Blueprint $table) {
            $table->string('color')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('classes', function (Blueprint $table) {
            //
        });
    }
};
