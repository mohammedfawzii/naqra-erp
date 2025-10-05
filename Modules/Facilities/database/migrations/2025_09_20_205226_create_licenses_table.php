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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
             $table->integer('ministry_name_id');
            $table->string('license_address');
            $table->string('license_number');
            $table->integer('license_type_id');
            $table->string('license_value');
            $table->string('branch_area');
            $table->date('license_start_date');
            $table->date('license_end_date');
            $table->integer('branch_id')->nullable();
            $table->integer('facility_attachments_id');
            $table->timestamps();
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
