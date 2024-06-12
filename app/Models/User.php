<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'avatar',
        'provider_name',
        'provider_id',
        'provider_token',
        'provider_refresh_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //Relación N:M con Post porque un user puede tener muchos post
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    //Relación N:M con Comment porque un user puede comentar en varios post
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    //Relación N:M con Post porque un user puede darle like a muchos post
    public function postsLike(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    //Relación N:M con User porque un user puede seguir a muchos user
    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    //Relación N:M con User porque un user puede ser seguido por muchos user
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    // Otorga acceso a los usuarios administradores al panel de control
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin;
    }
}
