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
        Schema::create('d_client_document_versions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path');
            $table->foreignId('document_id')
                ->nullable()
                ->references('id')
                ->constrained()
                ->on('d_client_documents')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_client_document_versions');
    }
};
