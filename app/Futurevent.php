<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Futurevent extends Model
{
    public $timestamps = false;
    public function profile()
    {
        return $this->belongsTo('App\Artistprofile');
    }
}
