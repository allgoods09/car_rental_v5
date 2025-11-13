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
        // Stores records of all payment transactions related to a booking.
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->decimal('down_payment', 10, 2)->default(0);
            $table->string('payment_method')->nullable(); // e.g., 'Credit Card', 'Paypal'
            $table->string('transaction_id')->unique()->nullable();
            $table->enum('status', ['partial', 'pending', 'succeeded', 'cancelled', 'refunded', 'fully paid'])->default('pending');
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
