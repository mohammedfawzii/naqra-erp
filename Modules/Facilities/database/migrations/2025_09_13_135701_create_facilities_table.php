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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('unified_national_number')->nullable();
            $table->string('company_name_ar');
            $table->string('company_name_en');
            $table->integer('company_type_id');
            $table->integer('company_size_id');
            $table->integer('company_headquarters_id');
            $table->integer('company_activities_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
