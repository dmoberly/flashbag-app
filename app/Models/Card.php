<?php

Namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [


        'deck_id',
        'question',
        'answer'

    ];

}

