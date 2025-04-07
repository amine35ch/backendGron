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
        Schema::table('d_project_document_versions', function (Blueprint $table) {
            $table->integer('external')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_project_document_versions', function (Blueprint $table) {
            $table->dropColumn('external');
        });
    }
};
