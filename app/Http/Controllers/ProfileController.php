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
}
