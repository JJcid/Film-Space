<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_type extends Model
{
    const SALE = 1;
    const RENT = 2;
    const SUSCRIPTION = 3;

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }

}
