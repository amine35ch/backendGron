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
        Schema::table('d_project_invoice_lines', function (Blueprint $table) {
            $table->string('sub_contractor_entitled')->nullable();
            $table->string('sub_contractor_siret')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_project_invoice_lines', function (Blueprint $table) {
            //
        });
    }
};
