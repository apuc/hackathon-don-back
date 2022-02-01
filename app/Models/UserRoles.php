<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property Role $role
 * @property User $users
 */
class UserRoles extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role_id',
    ];

    protected $table = 'user_roles';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
