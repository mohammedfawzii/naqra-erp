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
        Schema::create('owner_gulf_companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->string('gulf_commercial_number')->nullable();
            $table->json('name')->nullable();
            $table->string('company_type')->nullable();
            $table->string('company_status')->nullable();
            $table->string('company_nationality')->nullable();
            $table->string('email')->nullable();
            $table->string('landline')->nullable();
            $table->string('website')->nullable();

            $table->string('authorized_person')->nullable();
            $table->string('authorized_email')->nullable();
            $table->string('authorized_mobile')->nullable();
            $table->string('unified_phone')->nullable();

            $table->string('partnership_type')->nullable();
            $table->integer('partnership_percentage')->nullable();
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
        Schema::dropIfExists('owner_gulf_companies');
    }
};
