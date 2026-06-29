<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'FlightNumber',
        'Airline',
        'Origin',
        'Destination',
        'Status'
    ];
}