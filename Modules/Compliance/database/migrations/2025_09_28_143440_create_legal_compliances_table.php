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
        Schema::create('legal_compliances', function (Blueprint $table) {
            $table->id();
            $table->enum('compliance_status', ['pending', 'active', 'expired', 'suspended'])
                ->default('pending'); // حالة الامتثال
            $table->enum('compliance_type', ['legal', 'regional', 'data_privacy', 'remote_work'])
                ->default('legal'); // نوع الامتثال
            $table->date('review_date')->nullable(); // تاريخ المراجعة
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_compliances');
    }
};
