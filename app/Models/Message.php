<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content'
    ];
    
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function createForReceive($session_id, $to_user, $from_user)
    {
        return $this->chats()->create([
            'session_id' => $session_id,
            'type' => 1,
            'user_id' => $from_user,
            'user2_id' => $to_user,
        ]);
    }
}
