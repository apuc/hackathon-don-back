<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MediaFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
    ];

    protected $table = 'mediafile';

    public function authorityTaskMediaFile(): BelongsToMany
    {
        return $this->belongsToMany(Authority::class, 'authority_task_mediafile')->withTimestamps();
    }

    public function PetitionMediaFile(): BelongsToMany
    {
        return $this->belongsToMany(Authority::class, 'petition_task_mediafile')->withTimestamps();
    }
}
