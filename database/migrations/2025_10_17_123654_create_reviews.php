<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * The reviews table stores ratings and comments given to a car by a user.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // Foreign key to the users table (who wrote the review)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Foreign key to the cars table (which car is being reviewed)
            $table->foreignId('car_id')->constrained()->onDelete('cascade');

            $table->unsignedTinyInteger('rating')->comment('Rating from 1 to 5.');
            $table->text('comment')->nullable();
            
            // Ensures a user can only review the same car once (optional, but good practice)
            $table->unique(['user_id', 'car_id']); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
