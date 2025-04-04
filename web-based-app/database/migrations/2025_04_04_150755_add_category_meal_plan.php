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
        Schema::table('meal_plan', function (Blueprint $table) {
            //
            // Add the category column to the meal_plan table
            $table->string('category')->after('meal_plan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('meal_plan', function (Blueprint $table) {
            //
            // Drop the category column from the meal_plan table
            $table->dropColumn('category');

        });
    }

};
