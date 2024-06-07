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
        Schema::create('appointments', function (Blueprint $table) {
            
            $table->id('appointment_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('patient_id');
            $table->dateTime('requested_date');
            $table->integer('duration');
            $table->time('start_time')->nullable();
            // $table->time('end_time')->nullable();
            $table->date('appointment_date')->nullable();
            $table->decimal('price', 10, 2);
            $table->enum('status', ['pending', 'confirmed','inprogress', 'completed', 'cancelled'])->default('pending');
            $table->text('patient_message');
            $table->text('meeting_link')->nullable();
            $table->text('reject_reason')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
