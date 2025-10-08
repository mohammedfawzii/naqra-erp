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

        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facility_id')->nullable();
            $table->string('avatar')->nullable();
            $table->string('unified_national_number')->nullable();
            $table->json('name')->nullable();
            $table->unsignedBigInteger('entity_id')->nullable();
            $table->unsignedBigInteger('company_type_id')->nullable();
            $table->unsignedBigInteger('company_size_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('headquarter_id')->nullable();
            $table->unsignedBigInteger('activity_id')->nullable();

             $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

            $table->timestamps();

            $table->foreign('facility_id')->references('id')->on('facilities')->onDelete('cascade');
            $table->foreign('entity_id')->references('id')->on('entities')->nullOnDelete();
            $table->foreign('company_type_id')->references('id')->on('company_types')->nullOnDelete();
            $table->foreign('company_size_id')->references('id')->on('company_sizes')->nullOnDelete();
            $table->foreign('city_id')->references('id')->on('cities')->nullOnDelete();
            $table->foreign('headquarter_id')->references('id')->on('headquarters')->nullOnDelete();
            $table->foreign('activity_id')->references('id')->on('activities')->nullOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
