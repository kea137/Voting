<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Idea;
use App\Models\Status;

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

        Status::factory()->create(['name'=>'Red']);
        Status::factory()->create(['name'=>'Green']);
        Status::factory()->create(['name'=>'Blue']);
        Status::factory()->create(['name'=>'Yellow']);
        Status::factory()->create(['name'=>'Gray']);
        // \App\Models\User::factory(10)->create();
        Idea::factory(30)->create();
    }
}
