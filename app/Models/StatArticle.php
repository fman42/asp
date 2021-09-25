<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatArticle extends Model
{
    public $timestamps = false;

    protected $table = 'stats_articles';

    protected $fillable = [
        'likes_count',
        'viewers_count'
    ];

    use HasFactory;
}
