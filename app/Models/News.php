<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $primaryKey = 'news_id';

    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'author_id',
        'author_name',
        'published_at',
        'is_carousel',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_carousel'  => 'boolean',
    ];
}