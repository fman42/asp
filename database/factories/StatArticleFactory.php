<?php

namespace Database\Factories;

use App\Models\StatArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StatArticle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'likes_count' => mt_rand(0, 10),
            'viewers_count' => mt_rand(100, 300)
        ];
    }
}
