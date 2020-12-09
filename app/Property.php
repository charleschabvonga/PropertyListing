<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name', 'description', 'address', 'price', 'is_paid', 'image'];

    function user() {
        return $this->belongsTo('App\User');
    }

    public function bids()
    {
        return $this->hasMany('App\Bid');
    }
}
