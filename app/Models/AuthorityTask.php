<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class AuthorityTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'petition_id',
        'task_type',
        'explanations',
        'planned_date',
        'work_date',
        'responsible_id',
    ];

    protected $table = 'authority_task';

    public function petition(): BelongsTo
    {
        return $this->belongsTo(Petition::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }

    public function authorityTaskLog(): HasMany
    {
        return $this->hasMany(AuthorityTaskLog::class);
    }

    public function mediaFile(): BelongsToMany
    {
        return $this->belongsToMany(MediaFile::class, 'authority_task_mediafile')->withTimestamps();
    }

    public function authority(): BelongsToMany
    {
        return $this->belongsToMany(Authority::class, 'authority_authority_task')->withTimestamps();
    }
}
