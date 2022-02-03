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
    /**
     * @var string
     */
    protected $table = 'address';

    /**
     * @return HasMany
     */
    public function userProfile(): HasMany
    {
        return $this->hasMany(UserProfile::class);
    }

    /**
     * @return HasMany
     */
    public function transportStop(): HasMany
    {
        return $this->hasMany(TransportStop::class);
    }

    /**
     * @return HasMany
     */
    public function petition(): HasMany
    {
        return $this->hasMany(Petition::class);
    }

    /**
     * @return HasMany
     */
    public function authority(): HasMany
    {
        return $this->hasMany(Authority::class);
    }
}
