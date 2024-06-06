<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image', 'content'];

    //Relación 1:N con User porque un post pertenece a un usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //Relación N:M con Tag porque un post pertenece a varios tags
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    //Relación N:M con Comment porque un post puede tener varios comentarios
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    //Relación N:M con User porque un post puede tener el like de muchos usuarios
    public function usersLikes(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    //Accessors y mutators
    public function content(): Attribute
    {
        return Attribute::make(
            set: fn ($v) => ucfirst($v)
        );
    }

    //Método para obtener los tags del post
    public function getTagsId(): array
    {
        $tags = [];
        foreach ($this->tags as $tag) {
            $tags[] = $tag->id;
        }
        return $tags;
    }
}
