<?php

namespace App\Http\Controllers\Decks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($deckId)
    {
        $deck = Models\Deck::find($deckId);
        $newCard = new Models\Card;


        return view('cards.create', compact('deck', 'newCard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($deckId, $id)
    {
        $card = Models\Card::find($id);

        $deck = Models\Deck::find($deckId);

        $nextCard = Models\Card::where('deck_id', $deckId)->where('id', '>', $id)->orderBy('id', 'ASC')->first();

        $previousCard = Models\Card::where('deck_id', $deckId)->where('id', '<', $id)->orderBy('id', 'DEC')->first();

        return view('cards.show', compact('card', 'deck', 'nextCard', 'previousCard'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store($deckId, Request $request, $deck)
    {
        $card = new Models\Card;

        $deckId = Models\Deck::find($deckId);

        $decks = Models\Deck::all();

        $this->save($card, $request, $deckId, $decks);

        return redirect()->to('/my_decks/' . $deckId . '/cards')->with('success', 'Card was saved.');
    }




    public function save(Models\Card $card, Request $request, $deck)
    {
        $deck->id;
        $card->fill(
            [
                'question' => $request->input('question'),
                'answer' => $request->input('answer'),
                'deck_id' => $deck->id
            ]
        )->save();


    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function destroy($id)
    {
        //
    }
}
