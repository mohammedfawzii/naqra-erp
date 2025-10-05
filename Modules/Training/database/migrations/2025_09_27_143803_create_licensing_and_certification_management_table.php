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
        Schema::create('licensing_and_certification_management', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id'); // employee_info id
            $table->string('license_name');
            $table->date('renewal_date')->nullable();
            $table->enum('renewal_status', ['renewed', 'pending', 'expired'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licensing_and_certification_management');
    }
};
