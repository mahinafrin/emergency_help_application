<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oxygen extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'price',
        'contact',
        'location',
    ];
}
