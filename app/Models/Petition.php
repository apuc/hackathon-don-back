<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Petition extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id',
        'status',
        'description',
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
        return $this->belongsToMany(MediaFile::class, 'petition_mediafile')->withTimestamps();
    }

    public function hashTag(): BelongsToMany
    {
        return $this->belongsToMany(HashTag::class, 'petition_hash_tag')->withTimestamps();
    }
}
