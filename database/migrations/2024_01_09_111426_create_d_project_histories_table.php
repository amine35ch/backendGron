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
        Schema::create('d_project_histories', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->text('description');

            $table->foreignId('d_project_id')
                ->constrained()
                ->onUpdate('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->morphs('userable');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_project_histories');
    }
};
