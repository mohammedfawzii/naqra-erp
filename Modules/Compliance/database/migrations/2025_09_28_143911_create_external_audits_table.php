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
        Schema::create('external_audits', function (Blueprint $table) {
            $table->id();
            $table->string('auditor_name');      
            $table->enum('audit_type', ['financial', 'operational', 'compliance', 'it', 'other'])->default('other');                 
            $table->date('start_date');              
            $table->date('end_date')->nullable();     
            $table->enum('audit_status', ['pending', 'in_progress', 'completed', 'failed'])->default('pending');              
            $table->decimal('audit_percentage_score', 5, 2)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_audits');
    }
};
