<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'fio',
        'photo',
        'rating',
        'level',
        'email',
        'user_id',
        'address_id',
        'email_verified_at',
        'phone_verified_at',
    ];

    protected $table = 'user_profile';

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
