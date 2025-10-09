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
        Schema::create('employee_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');

            // 'current' or 'permanent'
            $table->enum('type', ['current', 'permanent']);

            // Address fields
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('street')->nullable();

            $table->string('building_number')->nullable();
            $table->string('building_type')->nullable();
            $table->string('building_name')->nullable();

            $table->string('postal_code')->nullable();
            $table->string('po_box')->nullable();

            $table->text('notes')->nullable();

            // Indicates if permanent address is same as current
            $table->boolean('same_address')->default(true); // fixed value

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null'); // renamed
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');       // renamed
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_addresses');
    }
};
