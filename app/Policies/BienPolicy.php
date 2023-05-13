<?php

namespace App\Policies;

use App\Models\Bien;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BienPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the bien can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list biens');
    }

    /**
     * Determine whether the bien can view the model.
     */
    public function view(User $user, Bien $model): bool
    {
        return $user->hasPermissionTo('view biens');
    }

    /**
     * Determine whether the bien can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create biens');
    }

    /**
     * Determine whether the bien can update the model.
     */
    public function update(User $user, Bien $model): bool
    {
        return $user->hasPermissionTo('update biens');
    }

    /**
     * Determine whether the bien can delete the model.
     */
    public function delete(User $user, Bien $model): bool
    {
        return $user->hasPermissionTo('delete biens');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete biens');
    }

    /**
     * Determine whether the bien can restore the model.
     */
    public function restore(User $user, Bien $model): bool
    {
        return false;
    }

    /**
     * Determine whether the bien can permanently delete the model.
     */
    public function forceDelete(User $user, Bien $model): bool
    {
        return false;
    }
}
