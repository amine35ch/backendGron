<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('p_shuttle_card_lines', function (Blueprint $table) {
            $table->boolean('update_project')->default(0);
            $table->boolean('update_client')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('p_shuttle_card_lines', function (Blueprint $table) {
        });
    }
};
