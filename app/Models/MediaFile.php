<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $path
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property PetitionMediaFile $petitionMediaFile
 * @property AuthorityTaskMediaFile $authorityTaskMediaFile
 */
class MediaFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
    ];

    protected $table = 'mediafile';

    public function authorityTaskMediaFile(): BelongsToMany
    {
        return $this->belongsToMany(AuthorityTaskMediaFile::class, 'authority_task_mediafile')->withTimestamps();
    }

    public function petitionMediaFile(): BelongsToMany
    {
        return $this->belongsToMany(PetitionMediaFile::class, 'petition_task_mediafile')->withTimestamps();
    }
}
