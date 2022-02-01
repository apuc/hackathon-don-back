<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 * @property int $is_visible
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property Authority $authority
 */
class AuthorityType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_visible',
    ];

    protected $table = 'authority_type';

    public function authority(): HasMany
    {
        return $this->hasMany(Authority::class);
    }
}
