<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportRoute extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'route_number',
    ];

    protected $table = 'transport_route';
}
