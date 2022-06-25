<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category' => "matematika",
            'name' => $this->faker->sentence(),
            'start_date' => $this->faker->dateTime(),
            'end_date' => now()->addMonths(6),
        ];
    }
}
