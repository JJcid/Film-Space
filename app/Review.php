<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Review
 *
 * @property-read \App\Film $film
 * @property-read \App\User $user
 * @mixin \Eloquent
 */
class Review extends Model
{
	protected $fillable = ['film_id', 'user_id', 'rating', 'comment'];

    public function film () {
    	return $this->belongsTo(Film::class);
    }

	public function user () {
		return $this->belongsTo(User::class);
	}
}
