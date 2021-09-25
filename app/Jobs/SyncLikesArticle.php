<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\ArticleStatStorage\{LikeStorage};
use Cache;
use App\Models\StatArticle;

class SyncLikesArticle implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $items = Cache::get(LikeStorage::STORAGE_KEY);
        foreach ($items as $index => $item) {
            StatArticle::where('article_id', $index)->update(['likes_count' => $item]);
        }
        
        return true;
    }
}
