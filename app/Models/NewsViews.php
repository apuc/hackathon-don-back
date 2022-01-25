<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsViews extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'news_id',
    ];

    protected $table = 'news_views';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
