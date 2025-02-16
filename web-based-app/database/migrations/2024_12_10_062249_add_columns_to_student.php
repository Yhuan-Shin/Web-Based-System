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
        Schema::table('student', function (Blueprint $table) {
            //
            $table->string('name');
            $table->string('grade');
            $table->string('section');
            $table->string('student_no');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student', function (Blueprint $table) {
            //
            $table->dropColumn('name');
            $table->dropColumn('grade');
            $table->dropColumn('section');
        });
    }
};
