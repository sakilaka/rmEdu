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
    //     Schema::create('instructor_page_contents', function (Blueprint $table) {
    //         $table->id();
    //         $table->unsignedBigInteger('instructor_id')->nullable();
    //         $table->string('content_name')->nullable();
    //         $table->string('contentimage')->nullable();
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructor_page_contents');
    }
};
