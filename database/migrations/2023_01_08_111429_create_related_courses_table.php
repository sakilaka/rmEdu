<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('related_courses', function (Blueprint $table) {
    //         $table->id();
    //         $table->unsignedBigInteger('course_id')->nullable();
    //         $table->unsignedBigInteger('relcou_id')->nullable();
    //         $table->boolean('status')->default(1);
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('related_courses');
    }
};
