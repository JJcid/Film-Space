<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Transaction_type
 *
 * @property-read \App\Transaction $transaction
 * @mixin \Eloquent
 */
class Transaction_type extends Model
{
    const SALE = 1;
    const RENT = 2;
    const SUSCRIPTION = 3;

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }

}
