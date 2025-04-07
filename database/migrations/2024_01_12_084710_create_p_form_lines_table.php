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
        Schema::create('p_form_lines', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('title');
            $table->integer('type');
            $table->tinyInteger('obligatory')->default(1);
            $table->json('content');
            $table->tinyInteger('file_test')->nullable();
            $table->tinyInteger('remarque')->nullable();
            $table->integer('order');
            $table->tinyInteger('active')->default(1);
            $table->foreignId('p_form_id')
                ->constrained('p_forms')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('p_form_bloc_id')
                ->constrained('p_form_blocs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('display_type')->nullable();
            $table->tinyInteger('empty_table')->default(0);
            $table->tinyInteger('break_page_after')->default(0);
            $table->string('bloc_title')->nullable();
            $table->tinyInteger('trv')->nullable();
            $table->tinyInteger('trv_two')->nullable();
            $table->string('title_trv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_form_lines');
    }
};
