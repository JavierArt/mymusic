<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Futurevent extends Model
{
    public function profile()
    {
        return $this->belongsTo('App\Artistprofile');
    }
}
