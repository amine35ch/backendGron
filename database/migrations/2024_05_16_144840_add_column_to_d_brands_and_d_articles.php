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
        Schema::table('d_brands', function (Blueprint $table) {
            $table->boolean('default')->default(0);
        });
        Schema::table('d_articles', function (Blueprint $table) {
            $table->boolean('default')->default(0);
        });

        Schema::table('d_works', function (Blueprint $table) {
            $table->boolean('default')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_brands', function (Blueprint $table) {
            //
        });
        Schema::table('d_articles', function (Blueprint $table) {
            //
        });
    }
};
