<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models;
use App;

class DecksController extends Controller
{
    public function index()
    {
        $decks = Models\Deck::all();

        return view('my_decks', compact('decks'));
    }

    public function show(Models\Deck $deckId, $id)
    {
        $deck = Models\Deck::find($id);



        $cards = Models\Card::where('deck_id', $id)->get();


        return view('decks.show', compact('deck', 'cards'));
    }

    public function create()
    {

        $deck = new Models\Deck;


        return view('decks.create', compact( 'deck'));
    }

    public function store(Request $request)
    {
        $deck = new Models\Deck;

        $user = App\User::all();

        $this->save($deck, $request, $user);

        return redirect()->to('/my_decks')->with('success', 'Deck was saved.');


    }

    public function save(Models\Deck $deck, Request $request, $user)
    {
        $user->id;
        $deck->fill(
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'user_id' =>$user->id
            ]
        )->save();


    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

}