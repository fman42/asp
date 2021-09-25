<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{TagArticle, StatArticle, Article};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Article::factory()->count(20)->create()->each(function (Article $article) {
            $article->tags()->saveMany(TagArticle::factory()->count(mt_rand(2, 3))->make());
            $article->stats()->saveMany(StatArticle::factory()->count(1)->make());
        });
    }
}
