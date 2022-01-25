<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Authority extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'mnemonic_name',
        'description',
        'email',
        'email_ministry',
        'address_id',
        'phone',
        'responsible_id',
        'web_resource',
        'additional_information',
        'authority_type_id',
        'inform_by_email',
        'inform_by_sms',
        'gen_daily_report',
        'is_visible',
    ];

    protected $table = 'authority';

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function authorityType(): BelongsTo
    {
        return $this->belongsTo(AuthorityType::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }

    public function district(): BelongsToMany
    {
        return $this->belongsToMany(District::class, 'authority_district')->withTimestamps();
    }

    public function incidentCategory(): BelongsToMany
    {
        return $this->belongsToMany(IncidentCategory::class, 'authority_incident_category')->withTimestamps();
    }

    public function authorityTask(): BelongsToMany
    {
        return $this->belongsToMany(AuthorityTask::class, 'authority_authority_task')->withTimestamps();
    }
}
