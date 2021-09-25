<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagArticle extends Model
{
    public $timestamps = false;

    protected $table = 'tags_articles';

    use HasFactory;
}
