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
        Schema::create('compliance_trainings', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id'); // معرف الموظف
            $table->string('training_name'); // اسم التدريب
            $table->date('training_starting_date'); // تاريخ بداية التدريب
            $table->date('training_ending_date'); // تاريخ انتهاء التدريب
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compliance_trainings');
    }
};
