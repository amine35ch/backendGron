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
        Schema::create('d_company_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unique(['name', 'd_company_id']);

            $table->index('name');
            $table->tinyInteger('type_doc')->nullable();
            $table->foreign('type_doc')->references('type')->on('p_documents');

            $table->foreignId('d_company_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('path')->nullable();
            $table->integer('version_count')->default(0);
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->string('creator_type')->nullable();
            $table->unsignedBigInteger('validator_id')->nullable();
            $table->string('validator_type')->nullable();
            $table->tinyInteger('is_validated')->default(0);
            $table->tinyInteger('required_document')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_company_documents');
    }
};
