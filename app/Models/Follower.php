<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'follower_id'];

    // Relación 1:N inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación 1:N inversa
    public function follower()
    {
        return $this->belongsTo(User::class);
    }
}
