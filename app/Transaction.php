<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function type() {
        return $this->hasOne(Transaction_type::class);
    }
}
