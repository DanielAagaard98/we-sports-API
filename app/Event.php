<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'creator_id', 'sport_id', 'title', 'city', 'address', 'datetime',
        'max_participants', 'current_participants', 'img', 'description'
    ];

    public $timestamps = true;
}
