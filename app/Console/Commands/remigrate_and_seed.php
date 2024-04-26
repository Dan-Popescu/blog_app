<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class remigrate_and_seed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remigrate_and_seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('migrate:fresh');
        $this->call('db:seed', ['--class' => 'DatabaseSeeder']);
        $this->call('db:seed', ['--class' => 'CategoriesTableSeeder']);
        $this->call('db:seed', ['--class' => 'UsersSeeder']);
        $this->call('db:seed', ['--class' => 'ArticlesSeeder']);
    }
}
