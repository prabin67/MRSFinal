<?php

namespace App\Http\Controllers;
use App\Models\movie;
use App\Models\User;
use App\Http\Controllers\Auth;

use App\Models\Comment;


use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AllMovieController extends Controller
{
    function AllMovies()
    {
        
        return view('allmovies',["movie"=> movie::all()]);
    }
     
    function landing_movie()
    {
      return view('landing_movie',["movie"=> movie::all()]);
    }
     

    function contact(){
      return view('contact');
    }
    function about(){
      return view('about');
    }
    
  function show($mid){

    $data['movie']=DB::table('movies')->where('mid','=',$mid)->get()->all();
    $data['comment']=DB::table('comments')->leftjoin('users','users.id','=','comments.user_id')->where('comments.mid','=',$mid)->get()->all();
    $data['rating']=DB::table('comments')->where('mid','=',$mid)->avg('ratings');
    return view('showmovie',['value'=>$data]);
  }

    
 

  function write_comment(Request $request){

    $rating = 0;
			$words = preg_replace('/[.,]/',"",$request->ucomment);
			$words = explode(" ",$words);
			if(count($words) > 0){
				$skw = 0;
				foreach($words as $kw){
          $get = DB::table('keywords')->select('score')->where('keyword','=',$kw)->get()->all();
					//$get = $this->conn->query("SELECT `score` from `sentiment_keywords` where `keyword` = '{$kw}' ");
          foreach($get as $value)
          {
            $skw++;
            $rating += $value->score;
          }
				}
				$rating = ceil($rating / $skw);
			}


   $comments=$request->ucomment;
   $mov=$request->mid;
   $use=$request->user_id;

   $data = DB::table('comments')->where('user_id','=',$use)->where('mid','=',$mov)->get()->all();
  //  dd(count($data) );die;
   if(count($data) > 0 ){
    return redirect()->back()->with('error','you have already commented');
   }

   $obj=new comment();
   $obj->mid=$mov;
   $obj->user_id=$use;
   $obj->users_comments=$comments;
   $obj->ratings=$rating;
   $obj->save();
   return back();

  }
  
   

}
