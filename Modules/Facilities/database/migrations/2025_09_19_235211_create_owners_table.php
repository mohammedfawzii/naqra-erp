<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facility_id')->nullable();
            $table->enum('owner_type', [
                'association',
                'foreign_company',
                'saudi_individual',
                'gulf_individual',
                'resident_individual',
                'saudi_company',
                'gulf_company',
                'endowment'
            ])->nullable();
            $table->timestamps();

            $table->foreign('facility_id')
                ->references('id')
                ->on('facilities')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
