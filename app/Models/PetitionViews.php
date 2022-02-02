<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $petition_id
 * @property int $user_id
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property Petition $petition
 * @property User $users
 */
class PetitionViews extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'petition_id',
    ];

    /**
     * @var string
     */
    protected $table = 'petition_views';

    /**
     * @return BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function petition(): BelongsTo
    {
        return $this->belongsTo(Petition::class);
    }
}
