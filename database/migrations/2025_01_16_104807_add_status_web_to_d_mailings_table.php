<?php

use App\Enums\PMailingEnum\P_mailing_type;
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
        Schema::table('d_mailings', function (Blueprint $table) {
            $table->enum('statusWeb', [P_mailing_type::DISABLED->value, P_mailing_type::ENABLED->value])->default(P_mailing_type::DISABLED->value);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_mailings', function (Blueprint $table) {
             $table->dropColumn('statusWeb');
        });
    }
};
