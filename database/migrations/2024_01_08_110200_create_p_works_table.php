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
        Schema::create('p_works', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->text('description')->nullable();
            $table->tinyInteger('type')->unique();
            $table->tinyInteger('unit')->nullable();
            $table->foreign('unit')->references('type')->on('p_units');
            $table->json('pricing_list')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_works');
    }
};
