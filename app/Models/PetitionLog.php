<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $petition_id
 * @property int $log_type_id
 * @property DateTime $datetime
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property Petition $petition
 * @property LogType $logType
 */
class PetitionLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'petition_id',
        'log_type_id',
    ];

    /**
     * @var string
     */
    protected $table = 'petition_log';

    /**
     * @return BelongsTo
     */
    public function logType(): BelongsTo
    {
        return $this->belongsTo(LogType::class);
    }

    /**
     * @return BelongsTo
     */
    public function petition(): BelongsTo
    {
        return $this->belongsTo(Petition::class);
    }
}
