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
        Schema::create('flexible_leave_management', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('selected_leaves')->nullable();
            $table->decimal('leave_cost', 10, 2)->default(0);
            $table->string('holidays_list_id');
            $table->integer('attendance_attachments_id')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flexible_leave_management');
    }
};
