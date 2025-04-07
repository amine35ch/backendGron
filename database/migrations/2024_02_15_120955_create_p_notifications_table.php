<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('p_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('entitled');
            $table->string('subject')->nullable();
            $table->tinyInteger('mail')->nullable();
            $table->tinyInteger('web')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_notifications');
    }
};
