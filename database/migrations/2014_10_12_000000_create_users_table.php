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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('phone_number')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            // $table->string('reference')->unique();
            $table->string('profile');
            $table->foreign('profile')->references('reference')
                ->on('p_profiles');
            $table->tinyInteger('state')->default(1);

            $table->string('company_code')->nullable();

            $table->nullableMorphs('userable');

            $table->string('signature')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->string('ip')->nullable();
            $table->tinyInteger('auth')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            // $table->unique(['username', 'userable_id']);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
