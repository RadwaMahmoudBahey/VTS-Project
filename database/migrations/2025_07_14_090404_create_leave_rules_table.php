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
        Schema::create('leave_rules', function (Blueprint $table) {
            $table->id('rule_id');
            $table->string('role_name')->unique();
            $table->unsignedInteger('annual_leave');
            $table->unsignedInteger('sick_leave');
            $table->unsignedInteger('half_day_leave');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_rules');
    }
};
