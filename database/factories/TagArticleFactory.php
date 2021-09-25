<?php

namespace Database\Factories;

use App\Models\TagArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TagArticle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag' => $this->faker->text(5)
        ];
    }
}
