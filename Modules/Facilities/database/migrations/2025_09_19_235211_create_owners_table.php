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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('facility_id')->nullable();

            $table->enum('owner_type', [
                'association',        // جمعية
                'foreign_company',    // شركة أجنبية
                'saudi_individual',   // فرد سعودي
                'gulf_individual',    // فرد خليجي
                'resident_individual',// فرد مقيم
                'saudi_company',      // شركة سعودية
                'gulf_company',       // شركة خليجية
                'endowment'           // وقف
            ])->nullable();

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
        Schema::dropIfExists('owners');
    }
};
