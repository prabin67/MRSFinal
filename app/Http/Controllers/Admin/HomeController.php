<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\movie;
use App\Models\Admin;
// use App\Http\Controllers\Admin\Auth;
use Auth;

use App\Models\Comment;
use App\Models\Keyword;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){
        return view('admin.dashboard',["movie"=> movie::all()]);
    }

    function Admin_show($mid){

        $data['movie']=DB::table('movies')->where('mid','=',$mid)->get()->all();
        $data['comment']=DB::table('comments')->leftjoin('users','users.id','=','comments.user_id')->where('comments.mid','=',$mid)->get()->all();
        $data['rating']=DB::table('comments')->where('mid','=',$mid)->avg('ratings');

       
        return view('admin.view_review',['value'=>$data]);
      }

    public function show_user(){
        return view('admin.userinfo',["user"=>user::all()]);
    }
    
    public function keywordlist(){
      return view('admin.addkeyword',["keyword"=>keyword::all()]);
    }

    public function addkeyword(Request $request){
      $obj= new keyword();
      $obj->keyword = $request->keyword;
      $obj->score=$request->score;
      $obj->save();
      return redirect()->back()->with('success','You have successfully added a keyword');
    
    }

    public function updatepass(){
      return view('admin.change');
    }

    public function update(Request $request)
    {
      

      if(!Hash::check($request->current, Auth::guard('admin')->user()->password)){
         return redirect()->back()->with('Error','current password does not match');
      }
      if(strcmp($request->current,$request->confirm)==0){
        return redirect()->back()->with('Error','Old password new password are same, please choose another Password');
      }
      $request->validate([
          'current'=>'required',
          'confirm'=>'required|min:8',
      ]);
      $update_pass=Admin::where('id','=',$request->id,)->first();
      $update_pass->password=Hash::make($request->confirm);
      $update_pass->save();
      return redirect(route('updatepass') )->with('message', 'Updated!');
    }

}
