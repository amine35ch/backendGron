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
        Schema::create('d_project_works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('d_project_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('d_work_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreignId('installer')
                ->nullable()
                ->constrained('d_companies')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->integer('qty')->default(0);
            $table->tinyInteger('is_validated')->default(0);
            $table->double('cost_ht_simulation', 24, 6)->default(0);
            $table->double('cost_ttc_simulation', 24, 6)->default(0);
            $table->double('cost_audit_ht', 24, 6)->default(0);
            $table->double('cost_audit_ttc', 24, 6)->default(0);
            $table->double('cost_invoice_ht', 24, 6)->default(0);
            $table->double('cost_invoice_ttc', 24, 6)->default(0);
            $table->tinyInteger('unit')->nullable();
            $table->foreign('unit')
                ->references('type')
                ->on('p_units')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('sub_contractor_entitled')->nullable();
            $table->string('sub_contractor_siret')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_project_works');
    }
};
