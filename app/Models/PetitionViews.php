<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PetitionViews extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'petition_id',
    ];

    protected $table = 'petition_views';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function petition(): BelongsTo
    {
        return $this->belongsTo(Petition::class);
    }
}
