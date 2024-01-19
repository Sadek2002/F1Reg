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
    // Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Result $result)
    {
        $user = auth()->user();
        if ($user->userRole == 1) {
            $this->authorize('create', $result);
        } else {
            return redirect()->route('homepage');
        }

        return view('results.create');
    }

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

    public function show(Result $result)
    {
        $user = auth()->user();
        if ($user->userRole == 1) {
            $this->authorize('viewAny', $result);
        } else {
            return redirect()->route('homepage.index');
        }

        return view('results.show', compact('result'));
    }

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

    public function update(UpdateResultRequest $request, Result $result)
    {
        $user = auth()->user();
        if ($user->userRole == 1) {
            $this->authorize('update', $result);
        } else {
            return redirect()->route('homepage');
        }

        $request->validate([
            'laptime' => 'required',
        ]);
        $result->update($request->all());
        return redirect()->route('results.index')
            ->with('success', 'Result updated successfully.');
    }

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
