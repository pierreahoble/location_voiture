<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Caracteristique;
use Illuminate\Auth\Access\HandlesAuthorization;

class CaracteristiquePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the caracteristique can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list caracteristiques');
    }

    /**
     * Determine whether the caracteristique can view the model.
     */
    public function view(User $user, Caracteristique $model): bool
    {
        return $user->hasPermissionTo('view caracteristiques');
    }

    /**
     * Determine whether the caracteristique can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create caracteristiques');
    }

    /**
     * Determine whether the caracteristique can update the model.
     */
    public function update(User $user, Caracteristique $model): bool
    {
        return $user->hasPermissionTo('update caracteristiques');
    }

    /**
     * Determine whether the caracteristique can delete the model.
     */
    public function delete(User $user, Caracteristique $model): bool
    {
        return $user->hasPermissionTo('delete caracteristiques');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete caracteristiques');
    }

    /**
     * Determine whether the caracteristique can restore the model.
     */
    public function restore(User $user, Caracteristique $model): bool
    {
        return false;
    }

    /**
     * Determine whether the caracteristique can permanently delete the model.
     */
    public function forceDelete(User $user, Caracteristique $model): bool
    {
        return false;
    }
}
