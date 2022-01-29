<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class News extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'rating',
        'views',
        'media',
        'news_category_id',
        'user_id',
    ];

    protected $table = 'news';

    public function category(): BelongsTo
    {
        return $this->belongsTo(IncidentCategory::class, 'news_category_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
