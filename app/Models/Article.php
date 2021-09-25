<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::created(function (Article $article) {
            $article->stats()->create([
                'likes_count' => 0,
                'viewers_count' => 0
            ]);
        });
    }

    public function scopeLIFO($q)
    {
        return $q->orderBy('created_at', 'ASC');
    }

    public function tags()
    {
        return $this->hasMany(TagArticle::class);
    }

    public function stats()
    {
        return $this->hasOne(StatArticle::class);
    }

    public function comments()
    {
        return $this->hasMany(CommentArticle::class);
    }
}
