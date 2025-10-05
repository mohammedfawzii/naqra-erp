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
        Schema::create('attendance_compliances', function (Blueprint $table) {
            $table->id();
             $table->enum('compliance_type', ['policy', 'regulation', 'internal'])->comment('Compliance Type');
            $table->enum('compliance_status', ['compliant', 'non_compliant', 'under_review'])->comment('Compliance Status');
            $table->date('review_date')->comment('Review Date');
                        $table->integer('attendance_attachments_id')->nullable(); // Foreign key to attachments table

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_compliances');
    }
};
