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
        Schema::create('p_states', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->integer('state');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('color')->nullable();
            $table->string('icon')->nullable();
            $table->unique(['state', 'model']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_states');
    }
};
