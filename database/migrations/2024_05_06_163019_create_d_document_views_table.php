<?php

use App\Models\DProjectDocument;
use App\Models\User;
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
        Schema::create('d_document_views', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DProjectDocument::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->integer('version_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_document_views');
    }
};
