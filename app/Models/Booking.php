<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'driver_age',
        'pickup_datetime',
        'return_datetime',
        'rental_days',
        'car_id',
        'usage_area_data',
        'car_subtotal',
        'extras_subtotal',
        'total_amount',
        'status',
    ];

    protected $casts = [
        'usage_area_data' => 'array',
        'pickup_datetime' => 'datetime',
        'return_datetime' => 'datetime',
    ];

    // 🧾 Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function drivers(): HasMany
    {
        return $this->hasMany(Driver::class);
    }

    public function extras(): HasMany
    {
        return $this->hasMany(BookingExtra::class);
    }
}
