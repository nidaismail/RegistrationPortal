<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pre_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('programs'); // Store selected programs as a comma-separated string
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('email')->unique();
            $table->string('phone', 13); // Adjusted to 12 for phone numbers
            $table->string('whatsapp_phone', 13); // Adjusted to 12 for WhatsApp numbers
            $table->string('mailing_address'); // Made required in the controller
            $table->string('city'); // Made required in the controller
            $table->integer('ssc_total_marks'); // Changed to integer
            $table->integer('ssc_obtained_marks'); // Changed to integer
            $table->integer('hssc_total_marks')->nullable(); // Changed to integer
            $table->integer('hssc_obtained_marks')->nullable(); // Changed to integer
            $table->integer('szabmu_marks')->nullable(); // Changed to integer
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_registrations');
    }
};
