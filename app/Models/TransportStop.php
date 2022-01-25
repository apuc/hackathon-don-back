<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function transportRoute(): BelongsToMany
    {
        return $this->belongsToMany(TransportRoute::class, 'route_stop')->withTimestamps();
    }
}
