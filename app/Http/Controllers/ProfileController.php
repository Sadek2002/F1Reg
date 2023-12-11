<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
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
        //
        $profiles = Profile::all()->sortByDesc('updated_at');
        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        //
        $request->validate([
            'user_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        Profile::create($request->all());

        return redirect()->route('profiles.index')->with('succes', 'Profile created succesfull');
        //        Succes message tonen
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        // Laat een profile zien
        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile, User $user)
    {
        $user = auth()->user();
        if ($user->userRole == 1) {
            $this->authorize('updateAsAdmin', $profile);
        } else {
            $this->authorize('update', $profile);
        }
    
        // Bewerken van een profile
        return view('profiles.edit', compact('profile'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {

        $user = auth()->user();
        if ($user->userRole == 1) {
            $this->authorize('updateAsAdmin', $profile);
        } else {
            $this->authorize('update', $profile);
        }

        //Update van een profile
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        $profile->update($request->all());

        return redirect()->route('profiles.index')->with('succes', 'Profile updated succesfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $user = auth()->user();
        if ($user->userRole == 1) {
            $this->authorize('deleteAsAdmin', $profile);
        } else {
            $this->authorize('delete', $profile);
        }
        //Verwijderen van een profile
        $profile->delete();
        return redirect()->route('profiles.index')->with('succes', 'Profile deleted succesfull');
    }
}
