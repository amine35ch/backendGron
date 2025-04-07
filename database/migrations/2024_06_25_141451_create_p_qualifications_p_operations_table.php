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
        Schema::create('p_qualifications_p_operations', function (Blueprint $table) {
            $table->tinyInteger('operation_type');
            $table->foreign('operation_type')
            ->references('type')
            ->on('p_operations');
            $table->integer('qualification_type');
            $table->foreign('qualification_type')
            ->references('type')
            ->on('p_qualifications');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_qualifications_p_operations');
    }
};
