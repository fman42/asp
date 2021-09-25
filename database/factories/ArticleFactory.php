<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->text(15),
            'image' => null,
            'content' => $this->faker->text(mt_rand(200, 300)),
            'created_at' => $this->faker->dateTimeThisMonth()
        ];
    }
}
