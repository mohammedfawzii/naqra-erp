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
        Schema::create('data_privacies', function (Blueprint $table) {
            $table->id();
            $table->enum('data_type', ['personal', 'financial', 'medical', 'employee', 'other'])->default('other');              // نوع البيانات
            $table->enum('privacy_status', ['protected', 'restricted', 'public', 'confidential'])->default('protected');          // حالة الخصوصية

            $table->date('review_date')->nullable(); // تاريخ المراجعة

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_privacies');
    }
};
