<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artistprofile;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Comment;
  
class CommentsController extends Controller
{
    public function index($id)
    {
      $comments = DB::table('comments')->where("commentable_id","=",$id)->get();
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
    $commentable_type="App/Pictures";
    $com = new Comment();
    $com->user = $request->user;
    $com->body = $request->body;
    $com->commentable_id = $id;
    $com->commentable_type = $commentable_type;
    $com->save();
    return redirect('/profiles');
    //body user commentable_id commentable_type
    //obtener body del formulario y arreglar lo del commentable type
    /*if($request->input('commentable_type') == 'Audio') {
        $origenType = 'App\Audio';
      }
      
    $body->body = $request->all();
    dd($body->body);
    if($body->save()){
        \Session::flash('flash_message', 'comentario añadido cambiado exitosamente!');
    }else{
        \Session::flash('flash_message', 'algo salio mal!');
    }
    return redirect('/profiles');
  }*/
  }
}
