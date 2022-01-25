<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        return $this->belongsToMany(News::class, 'incident_category_petition')->withTimestamps();
    }

    public function authority(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'authority_incident_category')->withTimestamps();
    }

    public function hashTag(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'incident_category_hash_tag')->withTimestamps();
    }
}
