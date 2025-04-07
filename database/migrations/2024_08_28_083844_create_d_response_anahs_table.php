<?php

use App\Models\DProject;
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
        Schema::create('d_response_anahs', function (Blueprint $table) {
            $table->id();
            $table->text('anah_first_depot_response');
            $table->dateTime('time');
            $table->foreignIdFor(DProject::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_response_anahs');
    }
};
