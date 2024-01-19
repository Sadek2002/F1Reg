<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\race;
use App\Models\RaceResult;
use Illuminate\Support\Collection;

class HomepageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        /**
         * In the index function $race finds the latest race id and display the data of it in our leaderboard.
         * $races grabs all the available races and passes the 'id, racename and created_at'.
         * We need this for the next function to display a specific race.
         */
        $race = race::latest('id')->first();;
        $races = race::all('id', 'racename');
        return view('homepage', compact(['race', 'races']));
    }
}
