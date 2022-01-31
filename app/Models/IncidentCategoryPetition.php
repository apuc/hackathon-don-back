<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $petition_id
 * @property int $incident_category_id
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property Petition $petition
 * @property IncidentCategory $incidentCategory
 */
class IncidentCategoryPetition extends Model
{
    use HasFactory;

    protected $fillable = [
        'petition_id',
        'incident_category_id',
    ];

    protected $table = 'incident_category_petition';

    public function incidentCategory(): BelongsTo
    {
        return $this->belongsTo(IncidentCategory::class, 'incident_category_id');
    }

    public function petition(): BelongsTo
    {
        return $this->belongsTo(Petition::class, 'petition_id');
    }
}
