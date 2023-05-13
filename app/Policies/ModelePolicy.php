<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Modele;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModelePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the modele can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list modeles');
    }

    /**
     * Determine whether the modele can view the model.
     */
    public function view(User $user, Modele $model): bool
    {
        return $user->hasPermissionTo('view modeles');
    }

    /**
     * Determine whether the modele can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create modeles');
    }

    /**
     * Determine whether the modele can update the model.
     */
    public function update(User $user, Modele $model): bool
    {
        return $user->hasPermissionTo('update modeles');
    }

    /**
     * Determine whether the modele can delete the model.
     */
    public function delete(User $user, Modele $model): bool
    {
        return $user->hasPermissionTo('delete modeles');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete modeles');
    }

    /**
     * Determine whether the modele can restore the model.
     */
    public function restore(User $user, Modele $model): bool
    {
        return false;
    }

    /**
     * Determine whether the modele can permanently delete the model.
     */
    public function forceDelete(User $user, Modele $model): bool
    {
        return false;
    }
}
