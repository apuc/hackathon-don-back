<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'rating',
        'views',
        'news_category_id',
        'user_id',
    ];

    protected $table = 'mediafile';
}
