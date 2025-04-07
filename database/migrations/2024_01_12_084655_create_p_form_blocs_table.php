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
        Schema::create('p_form_blocs', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('title');
            $table->integer('order');
            $table->tinyInteger('obligatory')->default(1);
            $table->tinyInteger('annex')->default(0);
            $table->foreignId('p_form_id')
                ->constrained('p_forms')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('title_works')->nullable();
            $table->tinyInteger('bloc_out_of_list')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_form_blocs');
    }
};
