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
        Schema::create('exit_data_security_management', function (Blueprint $table) {
            $table->id();
            $table->enum('security_type', ['Confidentiality', 'Access Control', 'Data Backup'])->default('Confidentiality');
            $table->string('security_status')->nullable();     
            $table->date('review_date')->nullable();          
            $table->string('exit_security_report_pdf')->nullable();
            $table->string('security_policy_excel')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exit_data_security_management');
    }
};
