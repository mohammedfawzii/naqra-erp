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
        Schema::create('time_tracking_integrations', function (Blueprint $table) {
            $table->id();
            $table->string('system_name'); // System Name
            $table->enum('integration_type', ['api', 'file_import', 'manual'])->comment('Integration Type');
            $table->enum('integration_status', ['active', 'inactive', 'error'])->comment('Integration Status');
                        $table->integer('attendance_attachments_id')->nullable(); // Foreign key to attachments table

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_tracking_integrations');
    }
};
