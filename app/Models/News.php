<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_category_id',
        'title',
        'content',
    ];

    function category() {
        return $this->belongsTo(NewsCategory::class, 'news_category_id', 'id');
    }
}
