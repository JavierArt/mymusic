<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
  public $timestamps = false;
     /**
     * Get all of the posts that are assigned this tag.
     */
  
    public function audios()
    {
        return $this->morphedByMany('App\Post', 'taggable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function videos()
    {
        return $this->morphedByMany('App\Video', 'taggable');
    }
}
