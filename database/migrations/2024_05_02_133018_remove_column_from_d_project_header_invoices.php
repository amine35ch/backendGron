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
        Schema::table('d_project_invoice_headers', function (Blueprint $table) {
            $table->dropColumn('rac');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_project_header_invoices', function (Blueprint $table) {
            $table->double('rac')->default(0);
        });
    }
};
