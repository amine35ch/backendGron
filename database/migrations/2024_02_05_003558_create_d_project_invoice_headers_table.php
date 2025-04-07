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
        Schema::create('d_project_invoice_headers', function (Blueprint $table) {
            $table->id();
            $table->string('reference'); //not unique
            $table->foreignId('d_project_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreignId('creator')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('validator')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->integer('state')->nullable()->default(0);
            $table->foreign('state')
                ->references('state')
                ->on('p_states')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->integer('nature')->nullable();
            $table->foreign('nature')
                ->references('nature')
                ->on('p_natures')
                ->onUpdate('cascade')
                ->onDelete('set null');
            //all devis
            $table->double('HT_total', 24, 6)->default(0);
            $table->double('TVA_total', 24, 6)->default(0);
            $table->double('TTC_total', 24, 6)->default(0);

            //devis mar

            $table->double('TTC_anah', 24, 6)->default(0);
            $table->double('TVA_anah', 24, 6)->default(0);
            $table->double('HT_anah', 24, 6)->default(0);
            $table->double('TTC_rest', 24, 6)->default(0);
            $table->double('TVA_rest', 24, 6)->default(0);
            $table->double('HT_rest', 24, 6)->default(0);

            //devis installer
            $table->double('plafond_prime', 24, 6)->default(0);
            $table->double('prime_bonification', 24, 6)->default(0);
            $table->double('prime_renov', 24, 6)->default(0);
            $table->double('prime_renov_bonification', 24, 6)->default(0);
            $table->double('rac', 24, 6)->default(0);

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('invoice_date')->nullable();
            $table->foreignId('d_company_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->double('payed_amount', 24, 6)->default(0);
            $table->tinyInteger('is_billed')->nullable()->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_project_invoice_headers');
    }
};
