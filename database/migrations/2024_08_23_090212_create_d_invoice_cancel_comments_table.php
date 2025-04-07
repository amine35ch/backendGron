<?php

use App\Models\DProject;
use App\Models\DProjectInvoiceHeader;
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
        Schema::create('d_invoice_cancel_comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment');
            $table->foreignIdFor(DProject::class);
            $table->foreignIdFor(DProjectInvoiceHeader::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_invoice_cancel_comments');
    }
};
