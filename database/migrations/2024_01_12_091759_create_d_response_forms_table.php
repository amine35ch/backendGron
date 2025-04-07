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
        Schema::create('d_response_forms', function (Blueprint $table) {
            $table->id();
            $table->json('response')->nullable();
            $table->tinyInteger('choice_id')->nullable();
            $table->json('path_photos')->nullable();
            $table->tinyInteger('state');
            $table->string('reference_line');
            $table->foreign('reference_line')->references('reference')->on('p_form_lines')->onDelete('cascade');
            $table->json('location')->nullable();
            $table->dateTime('image_date')->nullable();
            $table->foreignId('d_project_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_response_forms');
    }
};
