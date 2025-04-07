<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('p_shuttle_card_lines', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('input_type');
            $table->tinyInteger('form_bloc');
            $table->foreign('form_bloc')->references('type')->on('p_shuttle_card_blocs');
            $table->string('title');
            $table->json('content');
            $table->integer('order');
            $table->boolean('required')->default(true);
            $table->boolean('active')->default(true);
            $table->boolean('page_break_before')->default(0);
            $table->boolean('page_break_after')->default(0);
            $table->string('style')->nullable();
            $table->string('class')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_shuttle_card_lines');
    }
};
