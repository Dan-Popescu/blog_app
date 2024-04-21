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
            // Attacher des catégories aux articles
            $categories = Category::factory()->count(rand(1, 3))->create();
            $article->categories()->attach($categories);
        });
    }
}
