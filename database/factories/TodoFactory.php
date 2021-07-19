<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Todo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText(70),
            'due_date' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+2 week'),
            'finished' => $this->faker->boolean(50),
            'user_id' => rand(1, 10)
        ];
    }
}
