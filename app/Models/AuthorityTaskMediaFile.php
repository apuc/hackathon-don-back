<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $authority_task_id
 * @property int $mediafile_id
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property AuthorityTask $authorityTask
 * @property MediaFile $mediaFile
 */
class AuthorityTaskMediaFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'authority_task_id',
        'mediafile_id',
    ];
    /**
     * @var string
     */
    protected $table = 'mediafile';

    /**
     * @return BelongsTo
     */
    public function authorityTask(): BelongsTo
    {
        return $this->belongsTo(AuthorityTask::class, 'authority_task_id');
    }

    /**
     * @return BelongsTo
     */
    public function mediaFile()
    {
        return $this->belongsTo(MediaFile::class, 'mediafile_id');
    }
}
