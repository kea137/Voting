<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdeaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Idea::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1,4),
            'user_id' => User::factory(),
            'status_id' => $this->faker->numberBetween(1,5),
            'title' => ucwords($this->faker->words(3, true)),
            'description' => $this->faker->paragraph(3),
        ];
    }
}
