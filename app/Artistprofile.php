<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artistprofile extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function events()
    {
        return $this->hasMany('App\Futurevent');
    }
    public function audios()
    {
      return $this->hasMany('App\Audio');
    }
    public function videos()
    {
      return $this->hasMany('App\Video');
    }
}
