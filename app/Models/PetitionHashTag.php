<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $petition_id
 * @property int $hash_tag_id
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property Petition $petition
 * @property HashTag $hashTag
 */
class PetitionHashTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'petition_id',
        'hash_tag_id',
    ];

    /**
     * @var string
     */
    protected $table = 'petition_hash_tag';

    /**
     * @return BelongsTo
     */
    public function hashtag(): BelongsTo
    {
        return $this->belongsTo(HashTag::class, 'hash_tag_id');
    }

    /**
     * @return BelongsTo
     */
    public function petition(): BelongsTo
    {
        return $this->belongsTo(Petition::class, 'petition_id');
    }
}
