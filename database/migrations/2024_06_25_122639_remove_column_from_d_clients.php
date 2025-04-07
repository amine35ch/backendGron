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
        Schema::table('d_clients', function (Blueprint $table) {
            $table->dropColumn('email_contact_two');
            $table->dropColumn('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_clients', function (Blueprint $table) {
            $table->string('email_contact_two')->nullable();
            $table->string('address')->nullable();
        });
    }
};
