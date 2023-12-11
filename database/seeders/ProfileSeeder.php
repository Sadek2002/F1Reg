<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\User;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Users met een profile
        User::factory(10)
            ->create()
            ->each(function ($user){
                $user->profile()
                ->save(Profile::factory()->make());
            });

            \App\Models\User::factory()->create([
                'name' => 'Renas',
                'email' => 'renas@gmail.com',
                'userRole' => '1',
                'password' => 'admin',
            ]);
    }
}
