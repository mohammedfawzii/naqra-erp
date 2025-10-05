<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_information_employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->json('first_name')->nullable();
            $table->json('second_name')->nullable();
            $table->json('therd_name')->nullable();
            $table->json('family_name')->nullable();

            // Other Personal Info
            $table->unsignedBigInteger('nationality_id')->nullable();

            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed'])->nullable();
            $table->date('marriage_date')->nullable();


            $table->enum('gender', ['male', 'female'])->nullable();
            $table->date('birth_date')->nullable();
            $table->string('place_of_birth')->nullable();

            $table->string('national_id_number')->nullable();
            $table->date('national_id_expiry')->nullable();
            $table->unsignedBigInteger('religion_id')->nullable();


            // if not souadi
            $table->string('passport_type')->nullable();
            $table->string('passport_number')->nullable();
            $table->date('passport_issue_date')->nullable();
            $table->date('passport_expiry_date')->nullable();
            $table->string('passport_issue_place')->nullable();
            $table->string('passport_validity')->nullable();

            // Work Card Info
            $table->string('work_card_number')->nullable();
            $table->date('work_card_issue_date')->nullable();
            $table->date('work_card_expiry_date')->nullable();
            $table->string('work_card_fee')->nullable();

            // Iqama Info (الإقامة)
            $table->string('iqama_number')->nullable();
            $table->date('iqama_issue_date')->nullable();
            $table->date('iqama_expiry_date')->nullable();
            $table->string('iqama_fee')->nullable();

            // Document Attachment
            $table->string('document_type')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('religion_id')->references('id')->on('religions')->onDelete('set null');
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_information_employees');
    }
};
