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

Route::resource('register', 'Auth\RegisterController');

Route::resource('login', 'Auth\LoginController');

Route::resource('my_decks', 'DecksController');

Route::resource('my_decks/{deckId}/cards', 'Decks\CardsController');







