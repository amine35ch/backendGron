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
        Schema::create('p_profiles', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->unique();
            $table->string('entitled');
            $table->string('reference')->unique();
            $table->string('identifier')->unique();
            $table->tinyInteger('display')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_project_works');
    }
};
