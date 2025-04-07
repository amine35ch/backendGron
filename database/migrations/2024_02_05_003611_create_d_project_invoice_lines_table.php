<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('d_project_invoice_lines', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->nullable();
            $table->foreign('type')
                ->references('type')
                ->on('p_invoice_line_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('designation')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('d_project_invoice_header_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('d_work_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('d_article_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('d_project_invoice_lines')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->tinyInteger('unit')->nullable();
            $table->foreign('unit')
                ->references('type')
                ->on('p_units')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->double('qty', 24, 6)->default(1);
            $table->double('unit_price_HT', 24, 6)->default(0);
            $table->double('remise', 24, 6)->nullable()->default(0);
            $table->double('unit_price_HTNet', 24, 6)->default(0);
            $table->double('tva', 24, 6)->default(0.19);
            $table->double('unit_price_TTC', 24, 6)->default(0);
            $table->double('amount_HT', 24, 6)->default(0);
            $table->double('amount_HTNet', 24, 6)->default(0);
            $table->double('amount_TVA', 24, 6)->default(0);
            $table->double('amount_TTC', 24, 6)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_project_invoice_lines');
    }
};
