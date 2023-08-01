<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(20),
            'description' => fake()->sentence(20),
            'due_date' => now(),
            'employee_id' => function () {
                return \App\Models\Employee::factory()->create()->id;
            },
        ];
    }
}
