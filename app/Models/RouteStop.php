<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $transport_route_id
 * @property int $transport_stop_id
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class RouteStop extends Model
{
    use HasFactory;

    protected $fillable = [
        'transport_route_id',
        'transport_stop_id',
    ];
    /**
     * @var string
     */
    protected $table = 'transport_stop';
}
