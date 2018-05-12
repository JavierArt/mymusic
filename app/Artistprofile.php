<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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
    protected $fillable = [
        'user_id','photo', 'description', 'musictype','webpage','contactemail','artistname'
    ];
    protected $dates = ['deleted_at'];
  
    //Mutator
    public function setArtistNameAttribute($value)
    {
      $this->attributes['artistname'] = ucfirst(strtolower($value));
    }
    //accesor
    public function getLoggedProfile()
    {
         return $this->artistname. '('.  $this->musictype. $this->contactemail.')';
    }
}
