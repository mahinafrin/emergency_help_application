<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name',
        'donner_name',
        'phone',
        'address',
        'quantity',
    ];
}
