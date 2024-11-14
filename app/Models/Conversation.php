<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $fillable = [
        'classroom_id', 
        'title'
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'conversation_participant');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
