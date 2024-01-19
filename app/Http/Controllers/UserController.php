<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\RaceResult;

class UserController extends Controller
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
     * This is the home of the users page where the admin can see a display of all results
     * and he can create, edit and delete users (This is limited to only admin)
     */
    public function index()
    {
        /** 
         * This auth() code is used below for validation that
         * the logged in user is an admin by checking the user role.
         * 
         * If the user is not an admin he will be sent back to the homepage.
         */
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
     * This create function checks if the userrole is set to 1 (which is the admin userrole)
     * Makes it so only the admin can go to the create. (Users get sent to the homepage)
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
     * This stores the user inputs for the create function
     * with usage of validate so its secured.
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
     * This stores the user inputs for the create function
     * with usage of validate so its secured.
     */
    public function show(User $user, RaceResult $raceResult)
    {
        $raceResults = RaceResult::whereHas('result', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['race', 'result'])->get();

        return view('users.show', compact('user', 'raceResults'));
    }

    /** This is the edit function of Results also limited to only admin access */
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

    /** This is the update method for Results this function is limited to admin only */
    public function update(UpdateUserRequest $request, User $user)
    {
        // Check if the authenticated user is an admin
        $authenticatedUser = auth()->user();
        if ($authenticatedUser->userRole == 1) {
            // Admins can update ussers
            $this->authorize('update', $user);
        } else {
            // Users get redirected to homepage
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

        // Checks if the password field has input
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        // Update the userRole given from the dropdown
        if ($request->filled('userRole')) {
            $data['userRole'] = $request->input('userRole');
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /** 
     * This is the destroy function which only works if the user is an admin.
     * This deletes the user you select to delete.
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
