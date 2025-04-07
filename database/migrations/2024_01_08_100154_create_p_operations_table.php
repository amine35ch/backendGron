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
        Schema::create('p_operations', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->unique();
            $table->string('entitled');
            $table->text('description')->nullable();
            // foreign relation with profile on reference column
            $table->tinyInteger('profile')->nullable();
            $table->foreign('profile')
                ->nullable()
                ->references('type')
                ->on('p_profiles')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_operations');
    }
};
