<?php

namespace App\Policies;

use App\Models\Etablissement;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EtablissementPolicy
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
    public function view(User $user, Etablissement $etablissement): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user ): bool
    {
        if($user->getRole() === 'admin'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Etablissement $etablissement): bool
    {
        if($user->getRole() === 'admin'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Etablissement $etablissement): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Etablissement $etablissement): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Etablissement $etablissement): bool
    {
        return false;
    }
}
