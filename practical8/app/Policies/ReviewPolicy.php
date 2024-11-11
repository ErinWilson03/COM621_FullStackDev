<?php

namespace App\Policies;

use App\Models\Review;
use App\Enums\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReviewPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {

        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Review $review): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //only a guest user can create a review
        return $user->role == Role::GUEST;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Review $review): bool
    {
        // only an admin or author user can delete a review
        if ($user->role == Role::ADMIN || $user->role == Role::AUTHOR) {
            return true;
        } else {
            return false;
        }

    }
}
