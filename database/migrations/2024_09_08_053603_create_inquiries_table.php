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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->date('date_of_birth')->nullable();
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('applying_degree');
            $table->text('subject')->nullable();
            $table->text('country')->nullable();
            $table->text('university')->nullable();
            $table->json('education_details')->nullable();
            $table->json('documents')->nullable();
            $table->string('counselor_name')->nullable();
            $table->enum('foundation', ['Bachelor’s', 'Master’s', 'PhD']);
            $table->integer('budget')->nullable();
            $table->text('note')->nullable();
            $table->text('reference')->nullable();
            $table->enum('interest', ['Poor', 'High', 'Mid', 'Max'])->nullable();
            $table->string('unique_inquiry_code')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
