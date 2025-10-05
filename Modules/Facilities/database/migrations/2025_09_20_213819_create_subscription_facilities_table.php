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
        Schema::create('subscription_facilities', function (Blueprint $table) {
            $table->id();
            $table->integer('subscription_id');
            $table->integer('subscription_types_id');
            $table->string('invoice_number');
            $table->string('invoice_value');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('reminder_date')->nullable();
            $table->text('notes')->nullable();
            $table->integer('facility_attachments_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_facilities');
    }
};
