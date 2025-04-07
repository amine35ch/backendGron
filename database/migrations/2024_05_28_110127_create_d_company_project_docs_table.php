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
        Schema::create('d_company_project_docs', function (Blueprint $table) {
            $table->foreignId('d_company_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->tinyInteger('type_doc')->nullable();
            $table->foreign('type_doc')->references('type')->on('p_documents');
            $table->tinyInteger('required')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_company_project_docs');
    }
};
