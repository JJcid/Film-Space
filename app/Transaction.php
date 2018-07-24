<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    const SALE = 1;
    const RENT = 2;
    const SUBSCRIPTION = 3;
}
