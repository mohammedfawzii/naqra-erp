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
        Schema::create('owner_gulfs', function (Blueprint $table) {
            $table->id();

            $table->json('first_name_ar')->nullable();
            $table->json('second_name_ar')->nullable();
            $table->json('third_name_ar')->nullable();
            $table->json('family_name_ar')->nullable();

            $table->enum('gender', ['male', 'female'])->default('male');
            $table->date('birth_date')->nullable();
            $table->string('occupation')->nullable();
            $table->unsignedBigInteger('nationality_id')->nullable();

            $table->string('residency_number')->nullable();
            $table->string('gulf_national_id')->nullable();
            $table->string('email')->nullable();

            $table->string('saudi_mobile')->nullable();
            $table->string('foreign_mobile')->nullable();

            $table->string('saudi_address')->nullable();
            $table->string('foreign_address')->nullable();

            $table->string('partnership_type')->nullable();
            $table->integer('partnership_percentage')->nullable();




            $table->text('note')->nullable();
            $table->timestamps();
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
            $table->foreign('nationality_id')->references('id')->on('nationality')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owner_gulfs');
    }
};
