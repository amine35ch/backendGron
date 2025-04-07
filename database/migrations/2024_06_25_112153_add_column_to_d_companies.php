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
        Schema::table('d_companies', function (Blueprint $table) {
            $table->date('emissions_date_assurance')->nullable();
            $table->date('end_date_assurance')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_companies', function (Blueprint $table) {
            //
        });
    }
};
