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
        Schema::create('d_project_visits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('state')->default(0);
            $table->tinyInteger('type')->nullable();
            $table->foreign('type')->references('type')->on('p_type_visits');
            $table->dateTime('visit_date')->nullable();
            $table->dateTime('end_visit_date')->nullable();
            $table->foreignId('d_project_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreignId('d_company_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_project_visits');
    }
};
