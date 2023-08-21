<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
         return [
            'category' => fake() -> unique() -> randomElement([
                'application',
                'videogame',
                'artificial intelligence',
                'blockchain',
                'website',
                'software design',
                'browser',
                'computer science',
                'robotic',
                'automation'
            ]),
        ];
    }
}
