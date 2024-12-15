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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique();
            $table->string('name');
            $table->string('profile_picture')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('project_id')->constrained()->default(1); 
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->longText('reporting_manager_ids')->nullable();
            $table->string('designation');
            $table->string('domain');
            $table->date('joining_date');
            $table->string('mobile_no')->nullable();
            $table->string('address')->nullable();
            $table->date('dob')->nullable();
            $table->string('emergency_no')->nullable();
            $table->string('highest_qualification')->nullable();
            $table->string('adhaar_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('ifsc')->nullable();
            $table->string('uan')->nullable();
            $table->string('esic')->nullable();
            $table->string('salary')->nullable();
            $table->string('manday')->nullable();
            $table->integer('rest_days')->nullable();
            $table->integer('paid_leaves')->nullable();
            $table->integer('sick_leaves')->nullable();
            $table->integer('casual_leaves')->nullable();










            $table->rememberToken();
            $table->timestamps();
        });
   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
