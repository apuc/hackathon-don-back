<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $petition_id
 * @property int $task_type
 * @property string $explanations
 * @property DateTime $planned_date
 * @property DateTime $work_date
 * @property int $responsible_id
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property Petition $petition
 * @property User $users
 * @property AuthorityTaskLog $authorityTaskLog
 * @property MediaFile $mediaFile
 * @property Authority $authority
 */
class AuthorityTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'petition_id',
        'task_type',
        'explanations',
        'planned_date',
        'work_date',
        'responsible_id',
    ];
    /**
     * @var string
     */
    protected $table = 'authority_task';

    /**
     * @return BelongsTo
     */
    public function petition(): BelongsTo
    {
        return $this->belongsTo(Petition::class);
    }

    /**
     * @return BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }

    /**
     * @return HasMany
     */
    public function authorityTaskLog(): HasMany
    {
        return $this->hasMany(AuthorityTaskLog::class);
    }

    /**
     * @return BelongsToMany
     */
    public function mediaFile(): BelongsToMany
    {
        return $this->belongsToMany(MediaFile::class, 'authority_task_mediafile')->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function authority(): BelongsToMany
    {
        return $this->belongsToMany(Authority::class, 'authority_authority_task')->withTimestamps();
    }
}
