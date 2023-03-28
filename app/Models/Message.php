<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'messenger_id',
        'message',
        'read_at'
    ];

    public function replies()
    {
        return $this->hasMany(RepliedMessage::class, 'message_id', 'id');
    }
}
