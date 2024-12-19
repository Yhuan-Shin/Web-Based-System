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
        Schema::table('bmi', function (Blueprint $table) {
            //
            $table->string('st_last_name');
            $table->string('st_first_name');
            $table->string('st_middle_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bmi', function (Blueprint $table) {
            //
            $table->dropColumn('st_last_name');
            $table->dropColumn('st_first_name');
            $table->dropColumn('st_middle_name');
        });
    }
};
