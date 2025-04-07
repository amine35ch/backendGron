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
        Schema::create('p_forms', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->tinyInteger('active')->default(1);
            $table->integer('order_step')->nullable();
            $table->foreign('order_step')->references('order')->on('p_steps');
            $table->tinyInteger('type_doc')->nullable();
            $table->foreign('type_doc')->references('type')->on('p_documents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_forms');
    }
};
