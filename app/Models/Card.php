<?php

Namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Eloquents
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @mixin \Illuminate\Database\Query\Builder
 */

class Card extends Model
{
    public function deck()
    {
        return $this->belongsTo(Deck::class);
    }

    protected $fillable = [


        'deck_id',
        'question',
        'answer'

    ];

}

