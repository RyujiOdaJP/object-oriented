<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        return [
            'name' => $faker->name,
            'coach_name' => $faker->name,
            'capacity' => $faker->randomNumber(2),
            'start_at' => $faker->dateTime,
            'end_at' => $faker->dateTime
        ];
    }
}
