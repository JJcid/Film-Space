<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Role
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $user
 * @mixin \Eloquent
 */
class Role extends Model
{
    const ADMIN = 1;
    const USER = 2;

    public function user() {
        return $this->hasMany(User::class)->select('id', 'name', 'role_id');
    }
}
