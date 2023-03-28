<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'address'
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'messenger_id', 'id');
    }
}
