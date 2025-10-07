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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facility_id');
            $table->string('name')->unique();
            $table->string('registration_number');
            $table->text('address');
            $table->integer('branch_types_id');
            $table->date('registration_start_date');
            $table->date('registration_end_date');
            $table->integer('facility_attachments_id');
            $table->timestamps();
            
            $table->foreign('facility_id')
                ->references('id')
                ->on('facilities')
                ->onDelete('set null');
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
