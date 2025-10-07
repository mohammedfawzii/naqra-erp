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
        Schema::create('owner_saudi_individuals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->string('name')->nullable();
            $table->string('national_id')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('national_address')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('occupation')->nullable();
            $table->integer('partnership_percentage')->nullable();
            $table->string('partnership_type')->nullable();
            $table->text('note')->nullable();

            $table->timestamps();
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owner_saudi_individuals');
    }
};
