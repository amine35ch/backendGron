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
        Schema::create('d_companies', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('code')->unique();
            $table->string('email')->nullable();
            $table->string('email_two')->nullable();
            // $table->string('num_rge')->nullable();
            $table->string('siren')->nullable();
            // $table->date('date_expiration_rge')->nullable();
            $table->string('phone_number_1')->nullable()->unique();
            $table->string('phone_number_2')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('siret')->nullable();
            $table->tinyInteger('state')->nullable()->default(1);
            $table->string('profile');
            $table->foreign('profile')->references('reference')
                ->on('p_profiles');
            $table->double('tva', 24, 6)->nullable()->default(0.20);
            $table->double('tva_work', 24, 6)->nullable()->default(0.055);
            $table->string('identifiant_tva')->nullable();
            $table->string('logo')->nullable();
            $table->string('signature')->nullable();
            // company rcs
            $table->string('company_rcs')->nullable();

            // mar

            $table->string('trade_name')->nullable();
            $table->string('approval_number')->nullable();
            $table->double('capital', 24, 6)->nullable();
            // settings :)
            $table->tinyInteger('default_pagination')->default(10);
            $table->string('currency')->default('€');
            $table->tinyInteger('decimals')->default(2);

            $table->foreignId('parent_company_id')
                ->nullable()
                ->constrained('d_companies')
                ->onUpdate('cascade')
                ->onDelete('set null');
            // mandataire
            $table->boolean('representative_gender')->nullable();
            $table->string('representative_first_name')->nullable();
            $table->string('representative_last_name')->nullable();
            // installateur
            $table->string('insurance_address')->nullable();
            $table->string('insurance_rcs')->nullable();
            $table->double('insurance_capital', 24, 6)->nullable()->default(0);
            $table->string('insurance_police')->nullable();
            $table->string('position')->nullable();
            $table->tinyInteger('type_raison_sociale')->nullable();
            $table->foreign('type_raison_sociale')->references('type')->on('p_raison_types');
            $table->string('website')->nullable();
            $table->string('code_ape')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_companies');
    }
};
