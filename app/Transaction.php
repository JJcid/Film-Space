<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Transaction
 *
 * @property-read \App\Transaction_type $type
 * @property-read \App\User $user
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function type() {
        return $this->hasOne(Transaction_type::class);
    }
}
