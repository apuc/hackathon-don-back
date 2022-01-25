<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class HashTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    protected $table = 'hash_tag';

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'hash_tag_news')->withTimestamps();
    }

    public function petition(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'petition_hash_tag')->withTimestamps();
    }
}
