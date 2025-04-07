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
        Schema::create('p_bonuses', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type');

            $table->tinyInteger('income_classe')->nullable();
            $table->foreign('income_classe')
                ->references('type')
                ->on('p_project_income_classes');

            $table->tinyInteger('energy_classe')->nullable();
            $table->foreign('energy_classe')
                ->references('type')
                ->on('p_project_energy_classes');

            $table->tinyInteger('skip_count')->nullable();
            $table->foreign('skip_count')
                ->references('type')
                ->on('p_class_skip_counts');
            // amounts
            $table->double('bonus_percentage', 24, 6);
            $table->double('bonus_cap', 24, 6)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_bonuses');
    }
};
