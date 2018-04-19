<?php

namespace App\Http\Controllers\Decks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models;

class CardsController extends Controller
{

    public function index()
    {

    }


    public function create($deckId)
    {
        $deck = Models\Deck::find($deckId);
        $newCard = new Models\Card;


        return view('cards.create', compact('deck', 'newCard'));
    }


    public function show($deckId, $cardId)
    {
        $card = Models\Card::find($cardId);

        $deck = Models\Deck::find($deckId);

        $nextCard = Models\Card::where('deck_id', $deckId)->where('id', '>', $cardId)->orderBy('id', 'ASC')->first();

        $previousCard = Models\Card::where('deck_id', $deckId)->where('id', '<', $cardId)->orderBy('id', 'DEC')->first();

        return view('cards.show', compact('card', 'deck', 'nextCard', 'previousCard'));
    }


    public function toggleReview(Request $request, $deckId, $cardId)
    {
        $card = Models\Card::find($cardId);

        $deck = Models\Deck::find($deckId);








        //return redirect()->to('/my_decks/' . $deck->id . '/card/' . $card->id)->with(compact($card->id, $card));


        //return redirect()->to('/my_decks/' . $deck->id . '/results');



        return view('decks.toggle-review', compact('deck', 'card'));


    }


    public function store($deckId, Request $request)
    {
        $card = new Models\Card;

        $deck = Models\Deck::find($deckId);

        $this->save($card, $request, $deck);

        return redirect()->to('/my_decks/' . $deck->id);
    }


    public function save(Models\Card $card, Request $request, $deck)
    {
        $this->validate(request(),[

            'question' => 'required',

            'answer' => 'required'
        ]);

        $card->fill(
            [
                'question' => $request->input('question'),
                'answer' => $request->input('answer'),
                'deck_id' => $deck->id
            ]
        )->save();


    }


    public function edit($deckId, $cardId)
    {
        $method = "PUT";

        $action = "/my_decks/" . $deckId . "/card/" . $cardId;

        $submit_text = "Update Card";

        return view('cards.edit', compact( 'method', 'action', 'submit_text', 'deckId', 'cardId'));
    }


    public function update($deckId, $cardId)
    {
        $deck = Models\Deck::where('user_id', auth()->user()->id)->where('id', $deckId)->first();

        $card = Models\Card::find($cardId);

        $card->question = request('question');

        $card->answer = request('answer');

        $card->save();

        return redirect()->to('/my_decks/' . $deck->id);
    }


    public function delete($deckId, $cardId)
    {
        $deck = Models\Deck::where('user_id', auth()->user()->id)->where('id', $deckId)->first();

        $card = Models\Card::find($cardId);

        return view('cards.delete', compact('deck', 'card'));
    }


    public function destroy($deckId, $cardId)
    {

        Models\Card::find($cardId)->delete();

        return redirect()->to('my_decks/' . $deckId);
    }
}
