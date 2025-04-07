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
        Schema::create('p_scale_lists', function (Blueprint $table) {
            $table->string('entitled')->index()->primary();
            $table->string('scale');
            $table->foreign('scale')->references('reference')->on('p_scales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_scale_lists');
    }
};
