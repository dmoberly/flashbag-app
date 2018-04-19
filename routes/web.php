<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FeaturedController@index');

Route::middleware('auth')->group(function () {

    Route::resource('my_decks', 'DecksController');

    Route::resource('my_decks/{deckId}/card', 'Decks\CardsController');

    Route::get('my_decks/{deckId}/delete', 'DecksController@delete')->name('delete');

    Route::get('my_decks/{deckId}/card/{cardId}/delete', 'Decks\CardsController@delete')->name('delete');

    Route::get('/my_decks/{deckId}/results', 'DecksController@results');

    Route::get('/my_decks/{deckId}/card/{cardId}/toggle-review', 'Decks\CardsController@toggleReview');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

