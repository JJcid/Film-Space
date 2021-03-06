<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserSocialAccount
 *
 * @mixin \Eloquent
 */
class UserSocialAccount extends Model
{
    protected $fillable = ['user_id', 'provider', 'provider_uid'];
    public $timestamps = false;


    public function user() {
        $this->belongsTo(User::class);
    }
}
