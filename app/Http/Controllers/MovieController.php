<?php

namespace App\Http\Controllers;
use App\Models\movie;
use App\Models\User;
// use App\Http\Controllers\Auth;
use Auth;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MovieController extends Controller
{

    public function updatepassword(){
        return view('userpass');
    }
    public function updateuser(Request $request)
    {
      

      if(!Hash::check($request->current, Auth::user()->password)){
         return redirect()->back()->with('Error','current password does not match');
      }
      if(strcmp($request->current,$request->confirm)==0){
        return redirect()->back()->with('Error','Old password new password are same, please choose another Password');
      }
      $request->validate([
          'current'=>'required',
          'confirm'=>'required|min:8',
      ]);
      $update_pass=User::where('id','=',$request->id,)->first();
      $update_pass->password=Hash::make($request->confirm);
      $update_pass->save();
      return redirect(route('updatepass') )->with('message', 'Updated!');
    }

    
    function AddMovie(Request $request)
    {

        $file = $request->file('image');
            $newfilename= $file->getClientOriginalName();
            $file-> move(public_path('images/movies'), $newfilename);

        $obj= new movie();
       
       
       $obj->image=$newfilename;
       $obj->title= $request-> title;
       $obj->genre = $request-> genre;
       $obj->actor = $request->actor;
       $obj->director = $request->director;
       $obj->writter = $request->writer;
       $obj->released_date = $request->release_date;
       $obj->plot=$request->plot;
       $obj->save();

    
       return redirect()->back()->with('success','You have successfully added an movie');
    
    }

    function ViewMovie()
    {
        return view('admin.addmovie');
    }

    function MovieList()
    {
        return view('admin.movielist',["movie"=> movie::all()]);
    }

    function search(){
        $search_text=$_GET['query'];
        $movies=movie::where('title','LIKE','%'.$search_text.'%')->get();
        return view('search',compact('movies'));
    }

    function admin_search(){
        $search_text=$_GET['query'];
        $movies=movie::where('title','LIKE','%'.$search_text.'%')->get();
        return view('admin.admin_search',compact('movies'));
    }
    
    function getMovieDetail(Request $request)
    {
    
        $updatedData = array(
        "image" => $request->new_image,
        "title" => $request->new_title,
        "genre" => $request->new_genre,
        "actor" => $request->new_actor,
        "director" => $request->new_director,
        "writter" => $request->new_writer,
        "released_date" => $request->new_release_date,
        "plot" => $request->new_plot,
    );
                                    
    DB::table('movies')->where('mid',$request->mid)->update($updatedData);
            return redirect()->back()->with('success','movie updated Successfully');
        
        
        return $request->input();
    }

    function deleteMovie(Request $request)
    {
        $mid=$request->delete_mid;
        if(DB::table('movies')->where('mid','=',$mid)->delete()){
            return redirect()->back()->with('success','movie deleted Successfully');
        }
    }
}
