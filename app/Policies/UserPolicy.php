<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Add logic if needed
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $targetUser): bool
    {
        return $user->userRole === 1;
    }

    /**
     * Determine whether the user can create models.
     * This function in the policy makes it so only a user with userRole 1 can create
     * a Result. (User role 1 is only given to admin!)
     */
    public function create(User $user): bool
    {
        return $user->userRole === 1;
    }

    /**
     * Determine whether the user can update the model.
     * This function in the policy makes it so only a user with userRole 1 can update
     * a Result. (User role 1 is only given to admin!)
     */
    public function update(User $user, User $targetUser): bool
    {
        return $user->userRole === 1;
    }

    /**
     * Determine whether the user can delete the model.
     * This function in the policy makes it so only a user with userRole 1 can delete
     * a Result. (User role 1 is only given to admin!)
     */
    public function delete(User $user, User $targetUser): bool
    {
        return $user->userRole === 1;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $targetUser): bool
    {
        // Add logic if needed
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $targetUser): bool
    {
        // Add logic if needed
        return true;
    }
}
