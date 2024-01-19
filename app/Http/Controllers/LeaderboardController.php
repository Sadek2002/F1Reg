<?php

namespace App\Http\Controllers;

use App\Models\race;
use App\Models\result;
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

        $races = race::all('id', 'racename');
        return view('leaderboards', compact(['races']));
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

    public function getRaceid($id)
    {
        /**
         *We pass on the race ID to the uploadresult.view this allows us to attach the right race to the pivot table in the future.
         */
        $raceId = $id;
        return view('uploadresult', compact('raceId'));
    }

    public function create(Request $request)
    {
        //We add some validation rules so the user is submitting numbers and not anything else
        $request->validate([
            'laptime' => ['required', 'numeric', 'regex:/^\d{1}\.\d{3}$/'],
        ], [
            'laptime.numeric' => 'Laptime must be a numeric value.',
            'laptime.regex' => 'Laptime must be in the format 0.000.',
        ]);
        // After the validation rules we passing our variables to the values we want.
        $raceId = $request->input('raceId');
        $userId = $request->input('userId');
        $laptime = $request->input('laptime');
        //We check the validation, if something goes wrong we send and error back that gets caught back in the view and displays this.
        if (!is_numeric($laptime)) {
            return redirect()->back()->withInput()->withErrors(['laptime' => 'Laptime must be a numeric value.']);
        }
        //After the validation went well we create the result as entry in our table
        $result = result::create([
            'user_Id' => $userId,
            'laptime' => $laptime,
        ]);
        //Attaches the result and race id in our pivot table
        $result->races()->attach($raceId, ['race_id' => $raceId]);
        //Once everything went well we redirect the user back to the leaderboards.
        return redirect()->route('leaderboards')->with('success', 'Score sent successfully');
    }

}
