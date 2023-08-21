<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'title' => fake() -> word(),
            'description' => fake() -> paragraphs(2, true),
            'image' => fake() -> imageUrl(640, 480, 'office', true),
            'budget' => fake() -> randomNumber(5, false),
            'start_date' => fake() -> date(),
            'end_date' => fake() -> date(),
            'difficulty' => fake() -> randomElement(['facile', 'medio', 'difficile'])

        ];

    }

}




