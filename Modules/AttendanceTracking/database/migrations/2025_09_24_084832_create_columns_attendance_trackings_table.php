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
        Schema::create('columns_attendance_trackings', function (Blueprint $table) {
        $table->id();
        $table->string('model');
        $table->json('key');
        $table->json('label');
        $table->boolean('sortable')->default(true);
        $table->boolean('filterable')->default(true);
        $table->string('type')->default('string');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('columns_attendance_trackings');
    }
};
