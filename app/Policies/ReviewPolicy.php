<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReviewPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Review $review): bool
    {
        return ($user->id === $review->user_id && !is_null($user->courses()->where('course_id', $review->course_id)->first())) || $user->is_admin;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Course $course): bool
    {
        if (!$user->courses->contains($course)) {
            return false;
        }

        $percent = (int) $course->users()->find($user->id)->pivot->percent;

        return ($percent === 100) || $user->is_admin;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Review $review): bool
    {
        return ($user->id === $review->user_id && !is_null($user->courses()->where('course_id', $review->course_id)->first())) || $user->is_admin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Review $review): bool
    {
        return $user->id === $review->user_id || $user->is_admin;
    }
}
