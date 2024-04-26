<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title"=> $this->faker->sentence,
            "content"=> $this->faker->paragraph,
            'user_id' => User::factory()->create()->id,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Article $article) {
            $categories = Category::all()->random(rand(1, 3));
            $article->categories()->attach($categories);
        });
    }
}
