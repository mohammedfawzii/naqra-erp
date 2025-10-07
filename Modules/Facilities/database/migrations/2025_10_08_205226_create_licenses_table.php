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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facility_id')->nullable();
            $table->unsignedBigInteger('ministry_id');
            $table->unsignedBigInteger('branch_activity_specific_id');
            $table->unsignedBigInteger('license_type_id');
            $table->string('license_address');
            $table->string('license_number');
            $table->string('license_type');
            $table->string('branch_area');
            $table->date('license_start_date');
            $table->date('license_end_date');
            $table->string('license_value');
            $table->timestamps();
            $table->foreign('facility_id')->references('id')->on('facilities')->onDelete('set null');
            $table->foreign('ministry_id')->references('id')->on( 'ministries')->onDelete('cascade');
            $table->foreign('license_type_id')->references('id')->on('license_types')->onDelete('cascade');
            $table->foreign('branch_activity_specific_id')->references('id')->on('branch_activity_specifics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
    }
};
