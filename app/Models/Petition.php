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
 * @property int $user_id
 * @property int $address_id
 * @property int $status
 * @property string $description
 * @property int $rating
 * @property int $views
 * @property string $phone
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property User $user
 * @property Address $address
 * @property PetitionLog $petitionLog
 * @property AuthorityTask $authorityTask
 * @property PetitionViews $petitionViews
 * @property IncidentCategory $incidentCategory
 * @property MediaFile $mediaFile
 * @property HashTag $hashTag
 */
class Petition extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id',
        'status',
        'description',
        'phone'
    ];

    protected $table = 'petition';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function petitionLog(): HasMany
    {
        return $this->hasMany(PetitionLog::class);
    }

    public function authorityTask(): HasMany
    {
        return $this->hasMany(AuthorityTask::class);
    }

    public function petitionViews(): HasMany
    {
        return $this->hasMany(PetitionViews::class);
    }

    public function incidentCategory(): BelongsToMany
    {
        return $this->belongsToMany(IncidentCategory::class, 'incident_category_petition')->withTimestamps();
    }

    public function mediafile(): BelongsToMany
    {
        return $this->belongsToMany(MediaFile::class, 'petition_mediafile', 'petition_id', 'mediafile_id')->withTimestamps();
    }

    public function hashTag(): BelongsToMany
    {
        return $this->belongsToMany(HashTag::class, 'petition_hash_tag')->withTimestamps();
    }
}
