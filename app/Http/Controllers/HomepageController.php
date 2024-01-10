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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('homepage');

    // }


    public function index()
    {
        $raceResults = RaceResult::with(['race', 'result'])->get();

        return view('homepage', ['raceResults' => $raceResults]);
    }
}
