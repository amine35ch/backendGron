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

        Schema::table('p_sub_categories', function (Blueprint $table) {
            $table->integer('provisoir')->unique();
        });
        Schema::table('p_sub_categories', function (Blueprint $table) {
            $table->dropColumn('entitled');
            $table->dropColumn('sub_category');
            
        });
    
        Schema::table('p_sub_categories', function (Blueprint $table) {
            $table->string('sub_category')->unique()->primary();
        });

        Schema::table('p_sub_categories', function (Blueprint $table) {
            // $table->dropColumn('entitled');
            $table->dropColumn('provisoir');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('p_sub_categories', function (Blueprint $table) {
            $table->string('entitled')->nullable();
            $table->integer('provisoir')->unique();
            $table->string('sub_category')->unique()->primary();
        });
    }
};
