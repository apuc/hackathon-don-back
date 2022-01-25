<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorityTaskLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'authority_task_id',
        'log_type_id',
    ];

    protected $table = 'authority_task_log';
}
