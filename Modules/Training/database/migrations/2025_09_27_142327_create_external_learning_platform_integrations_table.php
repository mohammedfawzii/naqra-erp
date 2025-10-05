<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('external_learning_platform_integrations', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeinfo_id'); // employee_info id
             $table->string('platform_name');
            $table->enum('integration_status', ['active', 'failed', 'pending'])->default('pending');
            $table->timestamp('last_sync_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_learning_platform_integrations');
    }
};
