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
        Schema::table('regularize_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('reporting_manager_ids')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regularize_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('reporting_manager_ids')->nullable(false)->default(0)->change();
        });
    }
};
