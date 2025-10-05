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
        Schema::create('absence_analytics', function (Blueprint $table) {
            $table->id();
             $table->string('time_period');
            $table->decimal('absence_rate', 5, 2);
            $table->string('absence_reason')->nullable();
            $table->integer('attendance_attachments_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absence_analytics');
    }
};
