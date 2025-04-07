<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSelfCheckInToDCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('d_companies', function (Blueprint $table) {
            $table->boolean('selfCheckIn')->default(0); // Add selfCheckIn column with a default value of 0
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('d_companies', function (Blueprint $table) {
            $table->dropColumn('selfCheckIn');
        });
    }
}