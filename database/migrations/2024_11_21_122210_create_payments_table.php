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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollment_id')->constrained()->onDelete('cascade'); // Menghubungkan ke tabel enrollments
            $table->string('transaction_id')->unique(); 
            $table->string('order_id')->unique();
            $table->string('payment_method')->nullable(); 
            $table->decimal('amount', 10, 2); // Jumlah pembayaran
            $table->enum('status', ['pending', 'completed', 'failed', 'expired'])->default('pending'); 
            $table->timestamp('payment_date')->nullable(); 
            $table->json('payment_details')->nullable(); // Menyimpan detail pembayaran (seperti JSON dari Midtrans)
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
