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
            $table->unsignedBigInteger('collaborator_id')->nullable();
            $table->foreign('collaborator_id')->references('id')
            ->on('users');
            $table->tinyInteger('is_accepted')->default(0);
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
