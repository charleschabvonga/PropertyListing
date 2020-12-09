<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    function user() {
        return $this->belongsTo('App\User');
    }

    function property() {
        return $this->belongsTo('App\Property');
    }
}
