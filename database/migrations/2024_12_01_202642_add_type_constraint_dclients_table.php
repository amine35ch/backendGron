<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('d_clients', function (Blueprint $table) {
            $table->dropForeign(['type']);

            $table->tinyInteger('type')->default(1)->change();

            $table->foreign('type')->references('type')->on('p_type_clients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('d_clients', function (Blueprint $table) {
            $table->dropForeign(['type']);

            $table->tinyInteger('type')->nullable()->change();

            $table->foreign('type')->references('type')->on('p_type_clients');
        });
    }
};
