<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'user_id', 'event_id'
    ];

    public $timestamps = true;
}
