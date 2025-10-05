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
        Schema::create('training_attachments', function (Blueprint $table) {
            $table->id();
                $table->string('name')->nullable();
    $table->string('file');
    $table->string('reference_number')->nullable();
    $table->unsignedBigInteger('size');
    $table->string('mime_type')->nullable();

     $table->morphs('attachable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_attachments');
    }
};
