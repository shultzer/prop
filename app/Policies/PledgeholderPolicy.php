<?php

namespace App\Policies;

use App\Pledgeholder;
use App\User;
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
        foreach ( optional($user->roles) as $role ) {
            if ( $role->role == 'admin' ) {
                return TRUE;
            }
        }


    }

    public function create (?User $user) {
        foreach ( optional($user->roles) as $role ) {
            if ( $role->role == 'staff' ) {
                return TRUE;
            }
        }
        return FALSE;
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
