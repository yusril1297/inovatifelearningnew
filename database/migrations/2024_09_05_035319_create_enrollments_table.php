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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id() ;
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->timestamp('enrollment_date')->useCurrent(); // Automatically set enrollment time
            $table->string('payment_method')->nullable(); // Payment method (optional)
            $table->double('payable_amount')->nullable(); // Amount to be paid (optional)
            $table->enum('status', ['pending', 'active', 'canceled'])->default('pending'); // Enrollment status
            $table->dateTime('exp_time')->nullable(); // Cancellation time (optional)
            $table->boolean('is_lifetime')->default(false); // Lifetime access
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
