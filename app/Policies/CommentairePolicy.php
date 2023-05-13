<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Commentaire;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentairePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the commentaire can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list commentaires');
    }

    /**
     * Determine whether the commentaire can view the model.
     */
    public function view(User $user, Commentaire $model): bool
    {
        return $user->hasPermissionTo('view commentaires');
    }

    /**
     * Determine whether the commentaire can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create commentaires');
    }

    /**
     * Determine whether the commentaire can update the model.
     */
    public function update(User $user, Commentaire $model): bool
    {
        return $user->hasPermissionTo('update commentaires');
    }

    /**
     * Determine whether the commentaire can delete the model.
     */
    public function delete(User $user, Commentaire $model): bool
    {
        return $user->hasPermissionTo('delete commentaires');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete commentaires');
    }

    /**
     * Determine whether the commentaire can restore the model.
     */
    public function restore(User $user, Commentaire $model): bool
    {
        return false;
    }

    /**
     * Determine whether the commentaire can permanently delete the model.
     */
    public function forceDelete(User $user, Commentaire $model): bool
    {
        return false;
    }
}
