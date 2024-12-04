<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProjectsPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }
}
