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
        Schema::create('p_steps', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('display_name');

            $table->tinyInteger('process_type')->nullable();
            $table->foreign('process_type')->references('type')->on('p_processes');

            $table->tinyInteger('type_step');
            $table->integer('order')->unique();
            $table->index('order');
            $table->tinyInteger('progression')->nullable();
            $table->integer('next_step_order')->nullable();
            $table->integer('prev_step_order')->nullable();
            $table->string('permission')->nullable();
            $table->tinyInteger('state_init');
            $table->tinyInteger('state_fin')->nullable();
            $table->string('next_entitled_btn')->nullable();
            $table->string('cancel_entitled_btn')->nullable();
            $table->boolean('decision')->default(false);
            $table->boolean('display')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_steps');
    }
};
