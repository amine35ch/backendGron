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

            $table->foreignId('d_sub_contractor_id')
                ->nullable()
                ->constrained('d_companies')
                ->onUpdate('cascade')
                ->onDelete('set null');
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
