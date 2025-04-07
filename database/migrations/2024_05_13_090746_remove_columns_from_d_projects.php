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
            $table->dropColumn('is_billed');
            $table->dropColumn('reference_invoice');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_projects', function (Blueprint $table) {
            $table->tinyInteger('is_billed')->nullable()->default(0);
            $table->string('reference_invoice')->nullable();
        });
    }
};
