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
        Schema::table('p_scales', function (Blueprint $table) {
            $table->string('entitled');
            $table->tinyInteger('unit')->nullable();
            $table->foreign('unit')->references('type')->on('p_units');
            $table->tinyInteger('type');
            $table->json('bars')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('p_scales', function (Blueprint $table) {
            //
        });
    }
};
