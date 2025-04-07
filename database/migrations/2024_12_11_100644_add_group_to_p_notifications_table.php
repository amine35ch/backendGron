<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('p_notifications', function (Blueprint $table) {
            $table->integer('group')->nullable();
            $table->foreign('group')->references('group')->on('d_mailing_groups')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('p_notifications', function (Blueprint $table) {
            $table->dropForeign(['group']);
            $table->dropColumn('group');
        });
    }
};
