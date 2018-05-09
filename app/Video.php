<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function profile()
    {
      $this->belongsto('App\Artistprofile');
    }
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
