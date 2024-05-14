<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'color'];

    //Relación N:M con Post porque un tag pertenece a varios posts
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    //Accessors y mutators
    public function name(): Attribute
    {
        return Attribute::make(
            get: fn ($v) => "#" . $v,
            set: fn ($v) => strtolower($v)
        );
    }
}
