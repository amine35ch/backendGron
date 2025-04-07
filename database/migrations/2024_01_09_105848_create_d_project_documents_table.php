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
        Schema::create('d_project_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unique(['name', 'd_project_id']);

            $table->index('name');

            $table->tinyInteger('type_doc')->nullable();
            $table->foreign('type_doc')->references('type')->on('p_documents');

            $table->foreignId('d_company_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->integer('order_step')->nullable();
            $table->foreign('order_step')->references('order')->on('p_steps');

            $table->foreignId('d_project_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->tinyInteger('required')->default(0);
            $table->tinyInteger('exported')->nullable()->default(0);

            $table->string('reference_docusign')->nullable();
            $table->string('path')->nullable();
            $table->integer('version_count')->default(0);
            $table->tinyInteger('status')->nullable();
            $table->foreign('status')->references('status')->on('p_status_docs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_project_documents');
    }
};
