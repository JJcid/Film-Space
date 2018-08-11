<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    const NO_SUBSCRIPTION = 0;
    const SUBSCRIPTION = 1;

    public function category() {
        return $this->belongsTo(Category::class)->select('id', 'name');
    }

    public function isInSubscriptionPlan() {
        return $this->subscription_plan;
    }

    public function reviews() {
        return $this->hasMany(Review::class)->select('id', 'user_id', 'film_id', 'rating', 'comment', 'created_at');
    }

    public function pathAttachment() {
        echo asset('films/' . $this->picture);
    }

    public function getRatingAttribute() {
        return $this->reviews->avg('rating');
    }
}
