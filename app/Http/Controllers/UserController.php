<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\RaceResult;

class UserController extends Controller
{
    // Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->userRole == 1) {
            $this->authorize('create', $user);
        } else {
            return redirect()->route('homepage.index');
        }

        $users = User::all()->sortByDesc('updated_at');
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        $user = auth()->user();
        if ($user->userRole == 1) {
            $this->authorize('create', $user);
        } else {
            return redirect()->route('homepage.index');
        }

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'userRole' => 'required|in:0,1',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, RaceResult $raceResult)
    {
        $raceResults = RaceResult::whereHas('result', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['race', 'result'])->get();

        return view('users.show', compact('user', 'raceResults'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $authenticatedUser = auth()->user();

        // Check if the authenticated user is an admin
        if ($authenticatedUser->userRole == 1) {
            $this->authorize('update', $user);
        } else {
            // If not an admin, redirect to home
            return redirect()->route('homepage.index');
        }

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // Check if the authenticated user is an admin
        $authenticatedUser = auth()->user();
        if ($authenticatedUser->userRole == 1) {
            // Admins can update any user
            $this->authorize('update', $user);
        } else {
            // Non-admin users are not allowed to update other users
            return redirect()->route('homepage.index');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        // Check if a new password is provided
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        // Update the userRole in the request
        if ($request->filled('userRole')) {
            $data['userRole'] = $request->input('userRole');
        }

        // Update the specified user with the provided data
        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $authenticatedUser = auth()->user();

        if ($authenticatedUser->userRole == 1) {
            $this->authorize('delete', $user);

            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('homepage.index')->with('error', 'You do not have permission to delete users.');
        }
    }
}
