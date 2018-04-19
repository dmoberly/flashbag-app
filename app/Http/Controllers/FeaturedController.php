<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class FeaturedController extends Controller
{
    public function index ()
    {
        $decks = Models\Deck::orderBy('rating', 'desc')->take(12)->get();



        return view('featured.index', compact('decks'));
    }


}
