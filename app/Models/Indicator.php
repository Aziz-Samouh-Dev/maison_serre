<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;

    protected $table = 'indicators'; // Correct the table name

    protected $fillable = [
        'temp',
        'humidity',
        'soil_moisture',
        'light',
        'water_level',
    ];
}
