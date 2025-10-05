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
        Schema::create('regional_compliances', function (Blueprint $table) {
            $table->id();
            $table->enum('compliance_type', ['Local', 'Regional', 'International']);
            $table->enum('compliance_status', ['Active', 'Inactive', 'Pending']);
            $table->date('review_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regional_compliances');
    }
};
