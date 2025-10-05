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
        Schema::create('periodic_obligations', function (Blueprint $table) {
            $table->id();
            $table->date('zakat_due_date')->nullable();
            $table->date('zakat_reminder_date')->nullable();

            $table->date('tax_declaration_due_date')->nullable();
            $table->date('tax_declaration_reminder_date')->nullable();

            $table->date('salary_due_date')->nullable();
            $table->date('salary_reminder_date')->nullable();
            $table->integer('facility_attachments_id');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodic_obligations');
    }
};
