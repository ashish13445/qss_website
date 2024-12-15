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
        Schema::table('users', function (Blueprint $table) {
            $table->longText('assigned_area')->nullable();

            // Modify or add the assigned_project column if needed
            $table->integer('assigned_project')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
    // Drop the columns if rolling back
    $table->dropColumn('assigned_area');
    $table->dropColumn('assigned_project');
        });
    }
};
