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
        Schema::create('owner_saudi_companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->json('name')->nullable();
            $table->string('unified_national_number')->nullable();
            $table->date('commercial_registration_issue_date')->nullable();
            $table->date('annual_confirmation_date')->nullable();

            $table->string('authorized_person')->nullable();
            $table->string('authorized_email')->nullable();
            $table->string('authorized_mobile')->nullable();

            $table->string('landline')->nullable();
            $table->string('unified_phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('national_address')->nullable();

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
        Schema::dropIfExists('owner_saudi_companies');
    }
};
