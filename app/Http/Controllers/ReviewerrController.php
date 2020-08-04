<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\author;
use Auth;
use Image;

class ReviewerrController extends Controller
{
    public function index()
    {
        return view('/reviewer1/home');
    }
    function reviewerlist()
    {
        $user = author::where('reviewer_name', '=', 'reviewer1')->first();
        if ($user === null) {
            return view('/reviewer1/list1');
        }
        else{
            $data=DB::table("authors")->where('reviewer_name','reviewer1')->get();
            return view('/reviewer1/list', ["data" => $data]);
        }
    }
    function edit($id)
    {
        $data = author::find($id);
        return view('/reviewer1/edit', ['data' => $data]);
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
        return view('/reviewer1/show', ['data' => $data]);
    }

    function avtar(){
        return view('/reviewer1/profile',array('user'=> Auth::user()));
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
        return view('/reviewer1/profile',array('user'=> Auth::user()));
    }
}
