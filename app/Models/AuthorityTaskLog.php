<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $authority_task_id
 * @property int $log_type_id
 * @property DateTime $datetime
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class AuthorityTaskLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'authority_task_id',
        'log_type_id',
    ];
    /**
     * @var string
     */
    protected $table = 'authority_task_log';
}
