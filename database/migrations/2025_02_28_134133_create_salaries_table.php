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
    Schema::create('salaries', function (Blueprint $table) {
        $table->id();
        $table->string('employee_id');
        $table->string('employee_name');
        $table->string('designation');
        $table->string('month');
        $table->integer('year');
        $table->decimal('basic', 10, 2);
        $table->decimal('hra', 10, 2);
        $table->decimal('travel_allowance', 10, 2);
        $table->decimal('medical_allowance', 10, 2);
        $table->decimal('other_allowance', 10, 2);
        $table->decimal('bonus', 10, 2)->nullable();
        $table->decimal('gross_total', 10, 2);
        $table->decimal('provident_fund', 10, 2);
        $table->decimal('esic', 10, 2)->nullable();
        $table->decimal('profession_tax', 10, 2);
        $table->decimal('tds', 10, 2)->nullable();
        $table->decimal('advances', 10, 2)->nullable();
        $table->decimal('total_deduction', 10, 2);
        $table->decimal('net_salary', 10, 2);
        $table->timestamps();
    });
}

     
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
