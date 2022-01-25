<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        return $this->belongsToMany(News::class, 'authority_district')->withTimestamps();
    }
}
