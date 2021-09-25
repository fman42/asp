<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentArticle extends Model
{
    protected $table = 'comments_articles';

    protected $fillable = [
        'article_id',
        'subject',
        'body'
    ];

    use HasFactory;
}
