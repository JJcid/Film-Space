<?php

namespace App\Policies;

use App\User;
use App\Film;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilmPolicy
{
    use HandlesAuthorization;

    public function isInSubscriptionPlan(User $user, Film $film) {
        return $film->isInSubscriptionPlan();
    }

    public function is_admin (User $user){
        return $user->role_id === Role::ADMIN;
    }

    public function subscribe (User $user){
        return $user->role_id !== Role::ADMIN && ! $user->subscribed('main');
    }

    public function subscribed(User $user, Film $film) {
        return true;
    }

    public function view_film () {
//        TODO if subscription plan is active return true else return false
    }

}
