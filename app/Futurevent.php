<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Futurevent extends Model
{
    public $timestamps = false;
      protected $fillable = [
        'artistprofile_id','place', 'address', 'date', 'hora'
    ];
    public function profile()
    {
        return $this->belongsTo('App\Artistprofile');
    }
  protected $dates = ['date'];
}
