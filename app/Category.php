<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function films(){
        return hasMany(Film::class)->select('id', 'name', 'slug', 'launch_date', 'description', 'picture', 'subscription', 'sale_price', 'rent_price');
    }
}
