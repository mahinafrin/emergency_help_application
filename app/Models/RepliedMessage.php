<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepliedMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message_id',
        'message',
        'replied_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
