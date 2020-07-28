<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\author;

class ReviewerController extends Controller
{
    public function index()
    {
        return view('/reviewer/home');
    }
    function reviewerlist()
    {
        $data = author::all();
        return view('/reviewer/list', ["data" => $data]);
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
}
