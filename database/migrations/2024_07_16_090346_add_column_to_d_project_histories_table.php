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
        Schema::table('d_project_histories', function (Blueprint $table) {
            $table->dropForeign(['d_project_id']);
            $table->foreign('d_project_id')
            ->references('id')->on('d_projects')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_project_histories', function (Blueprint $table) {
            //
        });
    }
};
