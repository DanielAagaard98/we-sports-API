<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'creator_id', 'sport_id', 'city', 'address', 'datetime',
        'max_participants', 'current_participants', 'img'
    ];

    public $timestamps = true;
}
