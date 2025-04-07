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
        Schema::create('p_mar_scales', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('income_classe')->nullable();
            $table->foreign('income_classe')
                ->references('type')
                ->on('p_project_income_classes');
            $table->double('mar_scale', 24, 6);
            $table->double('mar_cap', 24, 6)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_mar_scales');
    }
};
