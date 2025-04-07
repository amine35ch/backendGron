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
        Schema::table('d_products', function (Blueprint $table) {
            $table->foreignId('d_brand_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->string('category')->nullable();
            $table->string('sub_category')->nullable();

            $table->foreign('category')
                ->references('category')
                ->on('p_categories')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('sub_category')
                ->references('sub_category')
                ->on('p_sub_categories')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreignId('d_company_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreignId('mar_id')
                ->nullable()
                ->constrained('d_companies')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->tinyInteger('access')->default(0);
            $table->tinyInteger('is_validated')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_products', function (Blueprint $table) {
            //
        });
    }
};
