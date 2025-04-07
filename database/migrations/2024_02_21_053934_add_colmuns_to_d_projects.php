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
            $table->date('last_status_change')->nullable();
            $table->date('anah_date')->nullable();
            $table->foreignId('inspector_id')
                ->nullable()
                ->constrained('users', 'id')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreignId('supervisor_id')
                ->nullable()
                ->constrained('users', 'id')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->dateTime('work_planned_start')->nullable();
            $table->dateTime('work_actual_start')->nullable();
            $table->dateTime('work_planned_end')->nullable();
            $table->dateTime('work_actual_end')->nullable();
            $table->integer('cleared_step_order')->default(1);
            $table->foreign('cleared_step_order')->references('order')->on('p_steps');
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
