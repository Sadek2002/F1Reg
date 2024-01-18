<?php

namespace Database\Seeders;

use App\Models\race;
use App\Models\result;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class race_results extends Seeder
{
    public function run()
    {
        // We create 2 races by calling on the race factory function.
        $race = Race::factory(2)->create();

        // For each race we have in our database(currently set to 2) we generate 25 results.
        $race->each(function ($races) {
            $result = Result::factory(25)->create();

            // With the attach method we now link each result with the races, this fills our Pivot table.
            foreach ($result as $results) {
                $races->results()->attach($results->id);
            }
        });
    }
}
