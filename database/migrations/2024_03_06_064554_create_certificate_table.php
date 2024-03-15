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
        Schema::create('certificate', function (Blueprint $table) {
            $table->id();
            $table->integer('template')->nullable();
            $table->string('student_id');
            $table->string('full_name');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('course_code');
            $table->string('issue_date');
            $table->string('picture')->nullable();
            $table->string('instructor_name');
            $table->longText('back_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate');
    }
};
