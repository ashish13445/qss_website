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
        Schema::create('time_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->datetime('clock_in')->nullable();
            $table->datetime('clock_out')->nullable();
            $table->date('date')->nullable();
            $table->time('working_hours')->nullable();
            $table->enum('remarks', ['present', 'leave', 'rest','holiday'])->default('present');
            $table->unsignedInteger('shift_no')->nullable();
            $table->timestamps();

            // Foreign key constraint to relate time entries to users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_entries');
    }
};
