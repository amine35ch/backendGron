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
            $table->tinyInteger('project_residence')->nullable();
            $table->foreign('project_residence')
            ->references('type')
            ->on('p_project_residences')
            ->onDelete('set null')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_project', function (Blueprint $table) {
            //
        });
    }
};
