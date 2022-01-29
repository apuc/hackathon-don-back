<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PetitionHashTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'petition_id',
        'hash_tag_id',
    ];

    protected $table = 'petition_hash_tag';

    public function hashtag(): BelongsTo
    {
        return $this->belongsTo(HashTag::class, 'hash_tag_id');
    }

    public function petition(): BelongsTo
    {
        return $this->belongsTo(Petition::class, 'petition_id');
    }
}
