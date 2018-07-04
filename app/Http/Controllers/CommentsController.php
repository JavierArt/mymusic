<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artistprofile;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Comment;
use App\Audio;

class CommentsController extends Controller
{
    public function index($id)
    {
      $comments = DB::table('comments')->where("commentable_id","=",$id)
        ->get();
      return view('comments.commentsh',compact('comments'));
    }
  
    public function create($id)
    {            
      if(Auth()->guard()->check()){
        $user = Artistprofile::find(Auth::user()->id)->artistname;
      }
      else{
        $user = 'Anonimo';
      }
      return view('comments.addcommentForm',compact('id','user'));      
    }
  
  public function store(Request $request,$id)
  {
/*    $bod = $request->body;
    $us = $request->user;
    $com = App/Audio::find($id)
    $com->comments()->create(["body"=> $bod,"user" => $us])*/
    $commentable_type="App/Pictures";
    $com = new Comment();
    $com->user = $request->user;
    $com->body = $request->body;
    $com->commentable_id = $id;
    $com->commentable_type = $commentable_type;
    $com->save();
    return redirect('/profiles');
  }
}
