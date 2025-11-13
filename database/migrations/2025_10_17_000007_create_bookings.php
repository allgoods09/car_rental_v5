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
        // The main transaction table for customer rentals.
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            
            // Customer Details: Links to the Users table
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->integer('driver_age');

            // Rental Period
            $table->dateTime('pickup_datetime');
            $table->dateTime('return_datetime');
            $table->integer('rental_days'); // Calculated duration

            // Vehicle and Usage
            $table->foreignId('car_id')->constrained('cars')->onDelete('restrict');
            $table->json('usage_area_data')->nullable(); // Stores map coordinates/radius JSON

            // Financials
            $table->decimal('car_subtotal', 10, 2);
            $table->decimal('extras_subtotal', 10, 2)->default(0.00);
            $table->decimal('total_amount', 10, 2);

            // Status (For admin verification)
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed', 'cancelled'])->default('pending');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
