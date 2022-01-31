<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property int $city_id
 * @property string $title
 * @property int $is_supported
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property Authority $authority
 */
class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'city_id',
        'is_supported',
    ];

    protected $table = 'district';

    public function authority(): BelongsToMany
    {
        return $this->belongsToMany(Authority::class, 'authority_district')->withTimestamps();
    }
}
