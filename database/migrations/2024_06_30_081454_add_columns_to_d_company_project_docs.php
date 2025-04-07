<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.²
     */
    public function up(): void
    {
        Schema::table('d_company_project_docs', function (Blueprint $table) {
            $table->tinyInteger('nature_doc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_company_project_docs', function (Blueprint $table) {
            //
        });
    }
};
