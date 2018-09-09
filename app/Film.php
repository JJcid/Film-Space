<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Film
 *
 * @property-read \App\Category $category
 * @property-read mixed $rating
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Review[] $reviews
 * @mixin \Eloquent
 */
class Film extends Model
{
    const NO_SUBSCRIPTION = 0;
    const SUBSCRIPTION = 1;

    protected $withCount = ['reviews'];

    public function category() {
        return $this->belongsTo(Category::class)->select('id', 'name');
    }

    public function isInSubscriptionPlan() {
        return $this->subscription;
    }

    public function reviews() {
        return $this->hasMany(Review::class)->select('id', 'user_id', 'film_id', 'rating', 'comment', 'created_at');
    }

    public function pathAttachment() {
        echo asset('storage/films/' . $this->picture);
    }

    public function getRatingAttribute() {
        return $this->reviews->avg('rating');
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function relatedFilms() {
        return Film::with('reviews')
        ->whereCategoryId($this->category->id)
        ->where('id', '!=', $this->id)
        ->latest()
        ->limit(5)
        ->get();
    }

}
