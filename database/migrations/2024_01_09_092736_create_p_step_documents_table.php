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
        Schema::create('p_step_documents', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('type_doc')->nullable();
            $table->foreign('type_doc')->references('type')->on('p_documents');

            $table->integer('order_step')
                ->nullable();

            $table->tinyInteger('required')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_step_documents');
    }
};
