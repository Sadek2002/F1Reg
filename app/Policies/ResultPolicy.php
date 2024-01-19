<?php

namespace App\Policies;

use App\Models\Result;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ResultPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $user = auth()->user();
        return $user->userRole === 1;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Result $result): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     * This function in the policy makes it so only a user with userRole 1 can create
     * a Result. (User role 1 is only given to admin!)
     */
    public function create(User $user): bool
    {
        $user = auth()->user();
        return $user->userRole === 1;
    }

    /**
     * Determine whether the user can update the model.
     * This function in the policy makes it so only a user with userRole 1 can update
     * a Result. (User role 1 is only given to admin!)
     */
    public function update(User $user, Result $result): bool
    {
        $user = auth()->user();
        return $user->userRole === 1;
    }

    /**
     * Determine whether the user can delete the model.
     * This function in the policy makes it so only a user with userRole 1 can delete
     * a Result. (User role 1 is only given to admin!)
     */
    public function delete(User $user, Result $result): bool
    {
        $user = auth()->user();
        return $user->userRole === 1;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Result $result): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Result $result): bool
    {
        //
    }
}
