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
            $table->tinyInteger('anah_first_depot_response_state')->default(0);
            $table->text('anah_first_depot_response')->nullable();
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
