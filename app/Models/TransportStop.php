<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $management_company
 * @property int $address_id
 * @property string $title
 * @property DateTime $created_at
 * @property DateTime $updated_at
 *
 * @property Address $address
 * @property RouteStop $routeStop
 */
class TransportStop extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'management_company',
        'address_id',
    ];

    protected $table = 'transport_stop';

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function routeStop(): BelongsToMany
    {
        return $this->belongsToMany(RouteStop::class, 'route_stop')->withTimestamps();
    }
}
