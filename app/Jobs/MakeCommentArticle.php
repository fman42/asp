<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\CommentArticle;
use Log;

class MakeCommentArticle implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $article_id;
    private $subject;
    private $body;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $article_id, string $subject, string $body)
    {
        $this->article_id = $article_id;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $commentArticle = CommentArticle::create([
            'article_id' => $this->article_id,
            'subject' => $this->subject,
            'body' => $this->body
        ]);

        if (!$commentArticle) {
            Log::error('CANT_CREATE_COMMENT_ARTICLE');
            return false;
        }

        return true;
    }
}
