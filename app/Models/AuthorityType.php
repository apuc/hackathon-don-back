<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
