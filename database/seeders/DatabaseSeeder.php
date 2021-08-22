<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Idea;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create(['name'=>'First']);
        Category::factory()->create(['name'=>'Second']);
        Category::factory()->create(['name'=>'Third']);
        Category::factory()->create(['name'=>'Fourth']);
        // \App\Models\User::factory(10)->create();
        Idea::factory(30)->create();
    }
}
