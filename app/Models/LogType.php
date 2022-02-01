<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property PetitionLog $petitionLog
 * @property AuthorityTaskLog $authorityTaskLog
 */
class LogType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    protected $table = 'incident_category';

    public function petitionLog(): HasMany
    {
        return $this->hasMany(PetitionLog::class);
    }

    public function authorityTaskLog(): HasMany
    {
        return $this->hasMany(AuthorityTaskLog::class);
    }
}
