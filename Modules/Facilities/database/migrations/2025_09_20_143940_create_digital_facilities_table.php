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
        Schema::create('digital_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('total_employees');
            $table->string('unified_national_number');
            $table->string('tax_number');
            $table->integer('commercial_record_value');
            $table->integer('capital');
            $table->date('start_date');
            $table->date('annual_confirmation_date');
            $table->date('financial_year_start');
            $table->date('financial_year_end');
            $table->integer('facility_attachments_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_facilities');
    }
};
