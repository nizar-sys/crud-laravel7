<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DivisiPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function akses_divisi(User $user)
    {
        // dd($user->id);
        return $user->username == 'admin';
    }

    public function crud_divisi(User $user)
    {
        return $user->username == 'admin';
    }
}
