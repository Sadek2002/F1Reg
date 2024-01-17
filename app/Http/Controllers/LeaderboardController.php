<?php

namespace App\Http\Controllers;

use App\Models\race;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    /**
     * In the index function $race finds the latest leaderboard and display the data of it.
     * $races grabs all the available races and passes the 'id, racename and created_at'.
     * We need this for the next function to display a specific race.
     */
    public function index()
    {
        $race = race::latest()->first();
        $races = race::all('id', 'racename');
        return view('leaderboards', compact(['race', 'races']));
    }

    public function races($id)
    {
        /**
         * In the races function we take the ID out of the request uri and execute a query that finds the race with the matching id
         * Then we send all the data that's in the table to the view and display this.
         */
        $allRaces = race::find($id);
        return view('leaderboard', compact('allRaces'));
    }

    public function searchRace()
    {
        /**
         * We can construct our query with the race::query, in there we do our where query that searches based on the get request.
         * We then execute the query and send the result to the racescore view.
         */
        $query = race::query();

        if (request()->has('search')) {
            $query->where('racename', '=', request()->get('search'));
            $race = $query->get();

        }
        return view('racescore', ['race' => $race]);
    }
}
