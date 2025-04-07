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
        Schema::table('d_projects', function (Blueprint $table) {
            $table->tinyInteger('invoice_mar')->default(0);
            $table->tinyInteger('invoice_installer')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_projects', function (Blueprint $table) {
            //
        });
    }
};
