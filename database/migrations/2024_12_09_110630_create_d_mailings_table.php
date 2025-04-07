<?php

use App\Enums\PMailingEnum\P_mailing_type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDMailingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_mailings', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('p_notification_id'); // Foreign key to p_notifications
            $table->unsignedBigInteger('d_company_id'); // Foreign key to d_companies
            $table->enum('status', [P_mailing_type::DISABLED->value, P_mailing_type::ENABLED->value])->default(P_mailing_type::DISABLED->value); // Status ENUM
            $table->timestamps(); // Created_at and Updated_at columns

            // Define foreign keys
            $table->foreign('p_notification_id')
                ->references('id')
                ->on('p_notifications')
                ->onDelete('cascade'); // Cascade delete if a related p_notification is deleted

            $table->foreign('d_company_id')
                ->references('id')
                ->on('d_companies')
                ->onDelete('cascade'); // Cascade delete if a related d_company is deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('d_mailings');
    }
}
