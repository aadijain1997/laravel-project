<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\author;
use Auth;
use Image;

class ReviewerController extends Controller
{
    public function index()
    {
        return view('/reviewer/home');
    }
    function reviewerlist()
    {
        $user = author::where('reviewer_name', '=', 'reviewer')->first();
        if ($user === null) {
            return view('/reviewer/list1');
        }
        else{
            $data=DB::table("authors")->where('reviewer_name','reviewer')->get();
            return view('/reviewer/list', ["data" => $data]);
        }
    }
    function edit($id)
    { 
        $data = author::find($id);
        return view('/reviewer/edit', ['data' => $data]);
    }
    function update(Request $req){
        if(isset($_GET["editcomment"]))
        {
           $status_id=$_GET["status_id"];
           $editcomment=$_GET["editcomment"];
           $id=$_GET["id"]; 
           $update_user = DB::table('authors')->where('id',$id)->update(['status_id'=>$status_id,'comment'=>$editcomment]);
           session()->flash('status','commented successfull');
           echo "done";
        }
    }

    public function view($id)
    {
        $data = author::find($id);
        return view('/reviewer/show', ['data' => $data]);
    }

    function avtar(){
        return view('/reviewer/profile',array('user'=> Auth::user()));
    }
     
    function profile(Request $req){
        if ($req->hasFile('avtar')) {
            $file = $req->file('avtar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(300,300)->save(public_path('/avatars/'.$filename));
            $user = Auth::user();
            $user->avtar = $filename;
            $user->save();
        }
        return view('/reviewer/profile',array('user'=> Auth::user()));
    }
}
