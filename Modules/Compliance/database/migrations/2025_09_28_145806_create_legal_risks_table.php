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
        Schema::create('legal_risks', function (Blueprint $table) {
            $table->id();
            $table->string('risk_type'); // نوع المخاطر
            $table->enum('risk_level', ['Low', 'Medium', 'High', 'Critical']); // درجة المخاطر
            $table->text('risk_description')->nullable(); // وصف المخاطر
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_risks');
    }
};
