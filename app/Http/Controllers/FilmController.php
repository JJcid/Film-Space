<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;

class FilmController extends Controller
{
    public function show(Film $film) {
        $film->load([
			'category' => function ($q) {
				$q->select('id', 'name');
			},
			'reviews.user',
        ])->get();
        $related = $film->relatedFilms();
        return view('partials.films.detail', compact('film', 'related'));
    }
}
