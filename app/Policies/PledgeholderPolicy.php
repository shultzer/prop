<?php

namespace App\Policies;

use App\Models\Pledgeholder;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PledgeholderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any pledgeholders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the pledgeholder.
     *
     * @param  \App\User  $user
     * @param  \App\Pledgeholder  $pledgeholder
     * @return mixed
     */
    public function view(User $user, Pledgeholder $pledgeholder)
    {
        //
    }

    /**
     * Determine whether the user can create pledgeholders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function before (?User $user) {
        //dd($user->role->name);
        if ($user){
            return $user->role->name== 'admin';
        }
        return false;


    }

    public function create (?User $user) {
        if ($user) {
            return $user->role->name == 'stuff';
        }
        return false;
    }

    /**
     * Determine whether the user can update the pledgeholder.
     *
     * @param  \App\User  $user
     * @param  \App\Pledgeholder  $pledgeholder
     * @return mixed
     */
    public function update(User $user, Pledgeholder $pledgeholder)
    {
        //
    }

    /**
     * Determine whether the user can delete the pledgeholder.
     *
     * @param  \App\User  $user
     * @param  \App\Pledgeholder  $pledgeholder
     * @return mixed
     */
    public function delete(User $user, Pledgeholder $pledgeholder)
    {
        //
    }

    /**
     * Determine whether the user can restore the pledgeholder.
     *
     * @param  \App\User  $user
     * @param  \App\Pledgeholder  $pledgeholder
     * @return mixed
     */
    public function restore(User $user, Pledgeholder $pledgeholder)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the pledgeholder.
     *
     * @param  \App\User  $user
     * @param  \App\Pledgeholder  $pledgeholder
     * @return mixed
     */
    public function forceDelete(User $user, Pledgeholder $pledgeholder)
    {
        //
    }
}
