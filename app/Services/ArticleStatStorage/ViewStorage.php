<?php

namespace App\Services\ArticleStatStorage;
use App\Models\StatArticle;

class ViewStorage extends ArticleStatStorage
{
    const STORAGE_KEY = 'viewers';

    private $article_id;

    public function __construct(int $article_id)
    {
        $this->article_id = $article_id;
    }

    public function getArticleId()
    {
        return $this->article_id;
    }

    public function syncBase()
    {
        return StatArticle::where('article_id', $this->article_id)->first()->viewers_count;
    }

    public function getStorageKey()
    {
        return self::STORAGE_KEY;
    }

    public function incrementField()
    {
        $val = $this->fetchElements();
        $val += 1;
        $this->setField($val);
    }
}