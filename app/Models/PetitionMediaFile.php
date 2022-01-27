<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PetitionMediaFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'petition_id',
        'mediafile_id',
    ];

    protected $table = 'petition_mediafile';

    public function mediafile(): BelongsTo
    {
        return $this->belongsTo(MediaFile::class, 'mediafile_id');
    }

    public function petition(): BelongsTo
    {
        return $this->belongsTo(Petition::class, 'petition_id');
    }
}
