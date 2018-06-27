<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['artistprofile_id', 'original_name', 'fs_name', 'mime', 'size', 'directory'];

    public function profile()
    {
      $this->belongsto('App\Artistprofile');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
