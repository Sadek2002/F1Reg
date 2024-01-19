<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RaceResult;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user, RaceResult $raceResult)

    {
        $raceResults = RaceResult::whereHas('result', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['race', 'result'])->get();

        return view('profiles.show', compact('user', 'raceResults'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all()->sortByDesc('updated_at');
        return view('profiles.index', compact('users'));
    }

    public function searchUser()
    {
        /**
         * We can construct our query with the user::query, in there we do our where query that searches based on the get request.
         * We then execute the query and send the result to the profile view.
         */
        $query = user::query();

        if (request()->has('search')) {
            $query->where('name', '=', request()->get('search'));
            $user = $query->pluck('id')->first();
        }
        
        return view('profiles.show', compact('user'));
    }
}
