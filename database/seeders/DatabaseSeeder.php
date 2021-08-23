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

        Status::factory()->create(['name'=>'Closed']);
        Status::factory()->create(['name'=>'In Progress']);
        Status::factory()->create(['name'=>'Implemented']);
        Status::factory()->create(['name'=>'Considering']);
        Status::factory()->create(['name'=>'Open']);
        // \App\Models\User::factory(10)->create();
        Idea::factory(30)->create();
    }
}
