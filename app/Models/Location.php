<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'country',
        'city',
        'region',
        'currency_code',
        'country_code',
        'region_code',
        'zip_code',
        'time_zone',
        'currency_symbol',
    ];
}
