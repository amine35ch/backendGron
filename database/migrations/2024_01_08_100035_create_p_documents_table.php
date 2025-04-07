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
        Schema::create('p_documents', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->nullable();
            $table->string('entitled');
            $table->tinyInteger('type')->unique();
            $table->string('blade_path')->nullable();
            $table->string('skeleton_path')->nullable();
            $table->json('permissions')->nullable();
            $table->tinyInteger('required')->default(0);
            $table->tinyInteger('exported')->nullable()->default(0);
            $table->tinyInteger('signature')->nullable();
            $table->tinyInteger('nature_doc')->nullable();
            $table->tinyInteger('downloadable')->nullable()->default(0);
            $table->tinyInteger('hidden')->nullable()->default(0);
            $table->foreign('nature_doc')->references('nature')->on('p_nature_docs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_documents');
    }
};
