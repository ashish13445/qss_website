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
            $table->renameColumn('reporting_manager_id', 'reporting_manager_ids');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regularize_requests', function (Blueprint $table) {
            $table->renameColumn('reporting_manager_ids', 'reporting_manager_id');
        });
    }
};
