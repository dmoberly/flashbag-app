<?php

Namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Eloquents
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @mixin \Illuminate\Database\Query\Builder
 */

class Deck extends Model
{
    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    protected $fillable = [

            'deckId',
            'user_id',
            'name',
            'description',
            'rating',
            'is_featured',
            'is_private'

        ];



    protected $table = 'decks';






}
