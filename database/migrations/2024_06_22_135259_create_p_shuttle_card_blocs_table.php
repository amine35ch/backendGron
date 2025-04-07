<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('p_shuttle_card_blocs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('p_form_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->tinyInteger('type')->unique();
            $table->string('title');
            $table->integer('order');
            $table->string('left_width')->default('0%');
            $table->string('center_width')->default('100%');
            $table->string('right_width')->default('0%');
            $table->boolean('page_break_before')->default(0);
            $table->boolean('page_break_after')->default(0);
            $table->boolean('required')->default(true);
            $table->boolean('active')->default(true);
            $table->string('style_title')->nullable();
            $table->string('class')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_shuttle_card_blocs');
    }
};
