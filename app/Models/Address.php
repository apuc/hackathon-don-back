<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $longitude
 * @property string $latitude
 * @property string $explanation
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property UserProfile $userProfile
 * @property TransportStop $transportStop
 * @property Petition $petition
 * @property Authority $authority
 */
class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'longitude',
        'latitude',
        'explanation'
    ];

    protected $table = 'address';

    public function userProfile(): HasMany
    {
        return $this->hasMany(UserProfile::class);
    }
    public function transportStop(): HasMany
    {
        return $this->hasMany(TransportStop::class);
    }

    public function petition(): HasMany
    {
        return $this->hasMany(Petition::class);
    }

    public function authority(): HasMany
    {
        return $this->hasMany(Authority::class);
    }
}
