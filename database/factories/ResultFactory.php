<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {/**
     * In our return statement we reference our User factory to create a user and connect a lap time that's between 1 - 10.
     * If we run ' php artisan tinker ' in our Console and run the following code ' result::factory()->count(1)->create()  '
     * The factory will create a user for us, and give the user a fake lap time. this is very useful for testing.
    */
        return [
            'user_id' => \App\Models\User::factory(),
            'laptime' => number_format(fake()->numberBetween(1000, 10000) / 1000, 3)
        ];
    }
}
