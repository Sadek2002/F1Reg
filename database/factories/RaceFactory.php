<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Laravel\Prompts\text;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Race>
 */
class RaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {/**
     * In the return statement we create a racename with some fake text.
     * If we run ' php artisan tinker ' in our Console and run the following code ' race::factory()->count(1)->create()  '
     * The factory will create a race for us. this is very useful for testing.
     */
        return [
            'racename' => fake()->text(),
        ];
    }
}
