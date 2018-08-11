<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::with('category', 'reviews')
            ->latest()
            ->paginate(12);
        return view('home', compact('films'));
    }
}
