<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Addresses extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'region',
        'province', 
        'barangay', 
    ];
}
