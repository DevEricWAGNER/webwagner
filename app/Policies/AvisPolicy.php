<?php

namespace App\Policies;

use App\Models\Avis;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AvisPolicy
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
    public function view(User $user, Avis $avis): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Avis $avis): bool
    {
        return $user->id === $avis->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Avis $avis): bool
    {
        $userAdmins = config('auth.super_admins');
        return $user->id === $avis->user_id || ($user->role->name === 'admin' && in_array($user->email, $userAdmins));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Avis $avis): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Avis $avis): bool
    {
        $userAdmins = config('auth.super_admins');
        return $user->role->name === 'admin' && in_array($user->email, $userAdmins);
    }
}