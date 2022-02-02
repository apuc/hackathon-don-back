<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $petition_id
 * @property int $mediafile_id
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property Petition $petition
 * @property MediaFile $mediafile
 */
class PetitionMediaFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'petition_id',
        'mediafile_id',
    ];

    /**
     * @var string
     */
    protected $table = 'petition_mediafile';

    /**
     * @return BelongsTo
     */
    public function petition(): BelongsTo
    {
        return $this->belongsTo(Petition::class, 'petition_id');
    }

    /**
     * @return BelongsTo
     */
    public function mediafile(): BelongsTo
    {
        return $this->belongsTo(MediaFile::class, 'mediafile_id');
    }
}
