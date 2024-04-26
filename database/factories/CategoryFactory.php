<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $categories = [
        'Action',
        'Adventure',
        'Role-playing',
        'Simulation',
        'Strategy',
        'Sports',
        'Puzzle',
        'Idle',
        'Arcade',
        'Racing',
        'Survival',
        'Horror',
        'MMORPG',
        'Open-world',
        'Sandbox',
        'Battle Royale',
        'First-person Shooter',
        'Third-person Shooter',
        'Platformer',
        'Roguelike',
        'Rhythm',
        'Stealth',
        'Survival Horror',
        'Tactical Shooter',
        'Tower Defense',
        'Visual Novel',
        'Real-time Strategy',
        'Turn-based Strategy',
        '4X',
        'Artillery',
        'Multiplayer Online Battle Arena',
        'Collectible Card Game',
        'Dungeon Crawler',
        'Hero Shooter',
        'Metroidvania',
        'MOBA',
        'Racing',
        'Real-time Strategy',
        'Rhythm',
        'Roguelike',
        'Role-playing',
        'Sandbox',
        'Shoot \'em up',
        'Shooter',
        'Simulation',
        'Sports',
        'Stealth',
        'Third-person Shooter',
        'Tower Defense',
        'Turn-based Strategy',
        'Visual Novel',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //"name"=> $this->faker->word,
            "color"=> $this->faker->hexColor,
            // Affect name ramdomly based on values definied in $ategories array
            "name"=> $this->faker->randomElement($this->categories),
            
        ];
    }
}
