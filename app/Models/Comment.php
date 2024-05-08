<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'user_id', 'post_id'];

    //Relación 1:N con User porque un comentario pertenece a un usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //Relación 1:N con Post porque un comentario pertenece a un post
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    //Accesors y mutators
    public function contenido(): Attribute
    {
        return Attribute::make(
            set: fn ($v) => ucfirst($v)
        );
    }
}
