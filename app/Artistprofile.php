<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Artistprofile extends Model
{
    public $timestamps = false;
    use Notifiable;
    
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
    public function pictures()
    {
      return $this->hasMany('App\Pictures');
    }
    protected $fillable = [
        'user_id', 'photo', 'bandornot', 'description', 'musictype','webpage','contactemail','artistname'
    ];
  
    //Mutator
    public function setArtistNameAttribute($value)
    {
      $this->attributes['artistname'] = ucfirst(strtolower($value));
    }
    //accesor
    public function getMusicTypeAttribute($value)
    {
        return ucfirst(strtolower($value));
    }
}
