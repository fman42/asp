<?php

namespace App\Services\ArticleStatStorage;

use Cache;

abstract class ArticleStatStorage
{
    public abstract function getArticleId();

    public abstract function getStorageKey();

    public abstract function incrementField();

    public abstract function syncBase();

    public function fetchElements(): int
    {
        $items = Cache::get($this->getStorageKey());
        if (!isset($items[$this->getArticleId()]))
        {
            $count = $this->syncBase();
            $this->setField($count);
            return $count;
        }

        return (int) $items[$this->getArticleId()];
    }

    protected function setField(int $val): void
    {
        Cache::put($this->getStorageKey(), [$this->getArticleId() => $val], 600);
    }
}