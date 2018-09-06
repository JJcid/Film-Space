<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Role $role
 * @property-read \App\UserSocialAccount $socialAccount
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Transaction[] $transactions
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Cashier\Subscription[] $subscriptions
 */
class User extends Authenticatable
{
    use Notifiable, Billable;

    protected static function boot () {
        parent::boot();
        static::creating(function (User $user) {
            if(! \App::runningInConsole()){
                $user->slug = str_slug($user->name . " " . $user->last_name, '-');
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function navigation () {
        return auth()->check() ? auth()->user()->role->name : 'guest';
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function socialAccount() {
        return $this->hasOne(UserSocialAccount::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class)->select('id', 'user_id');
    }
}
