<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\ArticleStatStorage\{ViewStorage};
use Cache;
use App\Models\StatArticle;
use Facade\FlareClient\View;

class SyncViewersArticle implements ShouldQueue
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
        $items = Cache::get(ViewStorage::STORAGE_KEY);
        foreach ($items as $index => $item) {
            StatArticle::where('article_id', $index)->update(['viewers_count' => $item]);
        }

        // some business logic...
        return true;
    }
}
