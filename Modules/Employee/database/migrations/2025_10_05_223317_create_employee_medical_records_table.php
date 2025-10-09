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
        Schema::create('employee_medical_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');

            $table->string('certificate_number')->nullable();   
            $table->decimal('certificate_value', 8, 2)->nullable();     
            $table->date('certificate_start_date')->nullable();     
            $table->date('certificate_end_date')->nullable();          
            $table->date('regular_checkup_date')->nullable();    
            $table->date('other_checkup_date')->nullable();            
            $table->string('medical_insurance')->nullable();        
            $table->unsignedBigInteger('medical_insurance_category_id')->nullable();
            $table->string('medical_insurance_value')->nullable();      
            $table->string('chronic_disease')->nullable();              
            $table->string('blood_type')->nullable();             
            $table->string('medical_condition')->nullable();  
                        $table->integer('employee_attachments_id')->nullable();
         
            $table->timestamps();

            $table->foreign('medical_insurance_category_id')
                ->references('id')
                ->on('medical_insurance_categories')
                ->onDelete('set null');
            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_medical_records');
    }
};
