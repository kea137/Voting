<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
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

        User::factory(20)->create();

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
        Idea::factory(100)->create();

        foreach (range(1, 20) as $user_id) {
            foreach (range(1, 100) as $idea_id) {
                if (($idea_id % 2) == 0) {
                    Vote::factory()->create([
                        'user_id'=>$user_id,
                        'idea_id'=>$idea_id,
                    ]);
                }
            }
        }
    }
}
