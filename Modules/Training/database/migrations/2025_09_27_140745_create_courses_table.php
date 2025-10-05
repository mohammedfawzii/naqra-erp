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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('program_name'); // اسم البرنامج
            $table->text('program_description')->nullable(); // وصف البرنامج
            $table->date('start_date'); // تاريخ البدء
            $table->date('end_date'); // تاريخ الانتهاء
            $table->enum('program_type', ['online', 'onsite', 'hybrid']);
            $table->integer('trainer_id');  // empoloyee_info id
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_program_management');
    }
};
