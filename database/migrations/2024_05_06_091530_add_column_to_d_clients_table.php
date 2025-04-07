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
        Schema::table('d_clients', function (Blueprint $table) {
            $table->string('representative_contact')->nullable();
            $table->string('climatic_zone')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_clients', function (Blueprint $table) {
            //
        });
    }
};
