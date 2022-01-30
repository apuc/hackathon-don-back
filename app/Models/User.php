<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public const ROLE_ADMIN = 1;
    public const ROLE_DRIVER = 2;
    public const ROLE_USER = 3;
    public const ROLE_MODERATOR = 4;

    public static function getRoles(): array
    {
        return [
            self::ROLE_ADMIN => 'Administrator',
            self::ROLE_DRIVER => 'Driver',
            self::ROLE_USER => 'User',
            self::ROLE_MODERATOR => 'Moderator',
        ];
    }

    public function isAdmin(): bool
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->id === self::ROLE_ADMIN) {
                return true;
            }
        }
        return false;
    }

    public function address(): HasOneThrough // TODO check this connection
    {
        return $this->hasOneThrough(Address::class, UserProfile::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_roles')->withTimestamps();
    }

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'news_views')->withTimestamps();
    }

    public function userProfile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

    public function petition(): HasMany
    {
        return $this->hasMany(Petition::class);
    }

    public function petitionViews(): HasMany
    {
        return $this->hasMany(PetitionViews::class);
    }

    public function newsViews(): HasMany
    {
        return $this->hasMany(NewsViews::class);
    }

    public function authorityTask(): HasMany
    {
        return $this->hasMany(AuthorityTask::class, 'responsible_id');
    }

    public function authority(): HasMany
    {
        return $this->hasMany(Authority::class, 'responsible_id');
    }
}
