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
        Schema::table('d_project_operations', function (Blueprint $table) {
            $table->tinyInteger('is_billed')->nullable()->default(0);
            $table->string('reference_invoice')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_project_operations', function (Blueprint $table) {
            //
        });
    }
};
