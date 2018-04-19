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
        $decks = Models\Deck::where('user_id', auth()->user()->id)->get();

        return view('my_decks', compact('decks'));
    }


    public function show($deckId)
    {

        $deck = Models\Deck::find($deckId);

        if (!$deck) {
            return view('restricted');
        }

        if ($deck->is_private AND $deck->user_id == auth()->user()->id) {

            $deck = Models\Deck::where('user_id', auth()->user()->id)->where('id', $deckId)->first();
        }

        elseif ($deck->is_private AND $deck->user_id !== auth()->user()->id) {

            return view('restricted');
        }

        $cards = Models\Card::where('deck_id', $deckId)->get();

        $user = App\User::find($deck->user_id);

        return view('decks.show', compact('deck', 'cards', 'user'));
    }


    public function results(Request $request, $deckId)
    {
        $deck = Models\Deck::where('id', $deckId)->first();

        $user = App\User::find($deck->user_id);

        $cards = Models\Card::where('deck_id', $deckId)->get();








        return view('decks.results', compact('deck', 'user', 'cards'));
    }


    public function create()
    {
        $deck = new Models\Deck;

        return view('decks.create', compact( 'deck'));
    }


    public function store(Request $request)
    {
        $deck = new Models\Deck;

        $this->save($deck, $request);

        return view('cards.create', compact('deck'));
    }


    public function save(Models\Deck $deck, Request $request)
    {
        $this->validate(request(),[

            'name' => 'required',

            'description' => 'required'
        ]);

        $deck->fill(
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'user_id' => auth()->user()->id,
                'is_private' => boolval($request->input('is_private'))
            ]
        )->save();

    }


    public function edit($deckId)
    {
        $method = "PUT";

        $action = "/my_decks/" . $deckId;

        $submit_text = "Update Deck";

        $deck = Models\Deck::where('user_id', auth()->user()->id)->where('id', $deckId)->first();


        return view('decks.edit', compact( 'method', 'action', 'submit_text', 'deckId', 'deck'));
    }


    public function update($deckId)
    {
        $deck = Models\Deck::where('user_id', auth()->user()->id)->where('id', $deckId)->first();


        $deck->name = request('name');

        $deck->description = request('description');

        $deck->is_private = boolval(request('is_private'));

        $deck->save();

        return redirect()->to('/my_decks/' . $deckId);
    }


    public function delete($id)
    {
        $deck = Models\Deck::where('user_id', auth()->user()->id)->where('id', $id)->first();




        return view('decks.delete', compact('deck'));
    }


    public function destroy($id)
    {
        Models\Deck::where('user_id', auth()->user()->id)->where('id', $id)->first()->delete();

        Models\Card::where('deck_id', $id)->delete();

        return redirect()->to('my_decks');
    }


}