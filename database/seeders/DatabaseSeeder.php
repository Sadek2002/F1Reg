<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.*/
    public function run(): void
    {

        //We generate an admin user with a set password and email, so we can always log in after a seed.
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'password'=> 'admin123',
            'email' => 'admin@gmail.com',
            'userRole' => '1',
        ]);
        //with $this->call we call our Profile seeder & race_results class and run the class to seed our database.
        $this->call(ProfileSeeder::class);
        $this->call(race_results::class);

    }
}
