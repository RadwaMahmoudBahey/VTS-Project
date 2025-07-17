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
        Schema::create('vacation_requests', function (Blueprint $table) {
            $table->id('request_id');
            $table->string('title');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->date('request_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('vacation_duration',  8, 2)->nullable();
            $table->text('description')->nullable();
            $table->enum('leave_type', ['annual', 'sick' , 'half-day']);
            $table->enum('half_day_leave', ['No', 'First Half', 'Second Half'])->default('No');
            $table->unsignedBigInteger('employee_id');
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employees')->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacation_requests');
    }
};
