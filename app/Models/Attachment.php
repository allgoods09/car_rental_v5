<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'url',
        'is_main',
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
