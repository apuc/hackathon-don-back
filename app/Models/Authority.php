<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $title
 * @property string $mnemonic_name
 * @property string $description
 * @property string $email
 * @property string $email_ministry
 * @property int $address_id
 * @property string $phone
 * @property int $responsible_id
 * @property string $web_resource
 * @property string $additional_information
 * @property int $authority_type_id
 * @property int $inform_by_email
 * @property int $inform_by_sms
 * @property int $gen_daily_report
 * @property int $is_visible
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property Address $address
 * @property AuthorityType $authorityType
 * @property User $users
 * @property District $district
 * @property IncidentCategory $incidentCategory
 * @property AuthorityTask $authorityTask
 */
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
    /**
     * @var string
     */
    protected $table = 'authority';

    /**
     * @return BelongsTo
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * @return BelongsTo
     */
    public function authorityType(): BelongsTo
    {
        return $this->belongsTo(AuthorityType::class);
    }

    /**
     * @return BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }

    /**
     * @return BelongsToMany
     */
    public function district(): BelongsToMany
    {
        return $this->belongsToMany(District::class, 'authority_district')->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function incidentCategory(): BelongsToMany
    {
        return $this->belongsToMany(IncidentCategory::class, 'authority_incident_category')->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function authorityTask(): BelongsToMany
    {
        return $this->belongsToMany(AuthorityTask::class, 'authority_authority_task')->withTimestamps();
    }
}
