<?php

Namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    protected $fillable = [

            'deckId',
            'user_id',
            'name',
            'description'

        ];






}
