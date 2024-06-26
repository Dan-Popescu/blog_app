<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // gaming articles categories options 
        $categories = [
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

        $categories = array_unique($categories);

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => $category,
                'color' => fake()->hexColor(),
            ]);
        }
    }
}
