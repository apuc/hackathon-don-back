<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncidentCategoryPetition extends Model
{
    use HasFactory;

    protected $fillable = [
        'petition_id',
        'incident_category_id',
    ];

    protected $table = 'incident_category_petition';

    public function hashtag(): BelongsTo
    {
        return $this->belongsTo(IncidentCategory::class, 'incident_category_id');
    }

    public function petition(): BelongsTo
    {
        return $this->belongsTo(Petition::class, 'petition_id');
    }
}
