<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $fillable = ['artistprofile_id', 'original_name', 'fs_name', 'mime', 'size', 'directorio'];
    public function profile()
    {
      $this->belongsto('App\Artistprofile');
    }
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
    public function tags()
    {
      return $this->morphToMany('App\tag','taggable')
    }
}
