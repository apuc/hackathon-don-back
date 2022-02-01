<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $title
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property Petition $petition
 * @property News $news
 */
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
        return $this->belongsToMany(Petition::class, 'petition_hash_tag')->withTimestamps();
    }
}
