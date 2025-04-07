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
        Schema::table('d_companies', function (Blueprint $table) {
            $table->string('linkToken', 255)->nullable()->unique(); // Replace 'some_column' with the column you want this to follow.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('d_companies', function (Blueprint $table) {
            $table->dropColumn('linkToken');
        });
    }
};
