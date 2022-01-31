<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $fio
 * @property string $photo
 * @property int $user_id
 * @property int $address_id
 * @property int $rating
 * @property int $level
 * @property DateTime $email_verified_at
 * @property DateTime $phone_verified_at
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property Address $address
 * @property User $users
 */
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
