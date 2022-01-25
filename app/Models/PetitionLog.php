<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PetitionLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'petition_id',
        'log_type_id',
    ];

    protected $table = 'petition_log';

    public function logType(): BelongsTo
    {
        return $this->belongsTo(LogType::class);
    }

    public function petition(): BelongsTo
    {
        return $this->belongsTo(Petition::class);
    }
}
