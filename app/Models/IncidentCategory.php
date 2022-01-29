<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class IncidentCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'mnemonic_name',
        'icon',
        'rating',
        'status',
    ];

    protected $table = 'incident_category';

    public function petition(): BelongsToMany
    {
        return $this->belongsToMany(Petition::class, 'incident_category_petition')->withTimestamps();
    }

    public function authority(): BelongsToMany
    {
        return $this->belongsToMany(Authority::class, 'authority_incident_category')->withTimestamps();
    }

    public function hashTag(): BelongsToMany
    {
        return $this->belongsToMany(HashTag::class, 'incident_category_hash_tag')->withTimestamps();
    }

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
