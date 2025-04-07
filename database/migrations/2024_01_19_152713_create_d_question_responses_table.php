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
        Schema::create('d_question_responses', function (Blueprint $table) {
            $table->id();
            $table->json('response');
            $table->tinyInteger('reference_question');
            $table->foreignId('d_project_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->tinyInteger('type_doc')->nullable();
            $table->foreign('type_doc')->references('type')->on('p_documents');
            $table->tinyInteger('update_project')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_question_responses');
    }
};
