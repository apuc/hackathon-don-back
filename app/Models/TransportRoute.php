<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $route_number
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class TransportRoute extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'route_number',
    ];

    /**
     * @var string
     */
    protected $table = 'transport_route';
}
