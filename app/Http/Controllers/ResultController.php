<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\race;
use App\Models\RaceResult;

use function Laravel\Prompts\alert;

class ResultController extends Controller
{
    /** 
     * This function makes use of the laravel/bootstrap auth method. 
     * This makes the website more secure as the user needs to be logged in to access the controller methods.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** 
     * This create function checks if the userrole is set to 1 (which is the admin userrole)
     * Makes it so only the admin can go to the create. (Users get sent to the homepage)
     */

    public function create(Result $result)
    {
        /** 
         * This auth() code is used below for validation that
         * the logged in user is an admin by checking the user role.
         * 
         * If the user is not an admin he will be sent back to the homepage.
         */
        $user = auth()->user();
        if ($user->userRole == 1) {
            $this->authorize('create', $result);
        } else {
            return redirect()->route('homepage');
        }

        return view('results.create');
    }

    /** 
     * This stores the user inputs for the create function
     * with usage of validate so its secured.
     */

    public function store(StoreResultRequest $request)
    {
        $request->validate([
            'user_id' => 'required',
            'laptime' => 'required',
        ]);
        Result::create($request->all());
        return redirect()->route('results.index')
            ->with('success', 'Result created successfully.');
    }

    /** 
     * This is the home of the results page where the admin can see a display of all results
     * and he can create, edit and delete those results (Also limited to only admin)
     */

    public function index()
    {
        $user = auth()->user();
        if ($user->userRole == 1) {
            $this->authorize('create', $user);
        } else {
            return redirect()->route('homepage.index');
        }

        $raceResults = RaceResult::with(['race', 'result'])->get();
        return view('results.index', ['raceResults' => $raceResults]);
    }

    /** This is the edit function of Results also limited to only admin access */

    public function edit(Result $result)
    {
        $user = auth()->user();
        if ($user->userRole == 1) {
            $this->authorize('update', $result);
        } else {
            return redirect()->route('homepage.index');
        }

        // Bewerken van een profile
        return view('results.edit', compact('result'));
    }

    /** This is the update method for Results this function is limited to admin only */

    public function update(UpdateResultRequest $request, Result $result)
    {
        $user = auth()->user();
        if ($user->userRole == 1) {
            $this->authorize('update', $result);
        } else {
            return redirect()->route('homepage');
        }

        // The $request method makes it so the laptime field is required for validation.
        $request->validate([
            'laptime' => 'required',
        ]);
        $result->update($request->all());
        return redirect()->route('results.index')
            ->with('success', 'Result updated successfully.');
    }

    /** This is the destroy function which only works if the user is an admin. */

    public function destroy(Result $result)
    {
        $user = auth()->user();
        if ($user->userRole == 1) {
            $this->authorize('delete', $result);
        } else {
            return redirect()->route('homepage.index');
        }

        $result->delete();
        return redirect()->route('results.index')
            ->with('success', 'Result deleted successfully.');
    }
}
