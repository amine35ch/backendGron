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

        Schema::table('p_categories', function (Blueprint $table) {
            if (!Schema::hasColumn('p_categories', 'provisoir')) {
                $table->string('provisoir')->unique();
            }
        });
        Schema::table('p_categories', function (Blueprint $table) {
            if (Schema::hasColumn('p_categories', 'entitled')) {
                $table->dropColumn('entitled');
            }
            $table->dropColumn('category');

        });
        Schema::table('p_categories', function (Blueprint $table) {
            $table->string('category')->unique()->primary();
        });
        Schema::table('p_categories', function (Blueprint $table) {
            $table->dropColumn('provisoir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('p_categories', function (Blueprint $table) {
            $table->string('entitled')->nullable();
        });
    }
};
