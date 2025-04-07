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
        Schema::create('d_project_occupants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('d_project_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->tinyInteger('civility')->nullable(); // enum to add
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('year_of_birth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_project_operations');
    }
};
