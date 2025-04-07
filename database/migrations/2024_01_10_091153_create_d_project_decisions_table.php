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
        Schema::create('d_project_decisions', function (Blueprint $table) {
            $table->id();

            $table->string('condition');
            $table->string('decision')->nullable();

            $table->foreignId('d_project_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->integer('order_step')->nullable();
            $table->foreign('order_step')->references('order')->on('p_steps');
            $table->tinyInteger('required')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_project_decisions');
    }
};
