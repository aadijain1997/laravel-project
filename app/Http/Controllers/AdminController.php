<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\user;



class AdminController extends Controller
{
    public function index()
    {
        return view('/admin/home');
    }
    function list(){
        $data=user::all();
        return view('/admin/list',["data"=>$data]);
    }

    function add(Request $req){

        $resto=new user;
        $resto->name=$req->input('name');
        $resto->email=$req->input('email');
        $resto->role=$req->input('role');
        $resto->password=Hash::make($req->input('password'));
        $req->session()->flash('status','user added successfully');
        return $resto->save();

        
    }

    function delete($id){
        user::find($id)->delete();
        session()->flash('status','user has been deleted');
        return redirect('/admin/list');
    }

    function edit($id){
        $data=user::find($id);
        return view('/admin/edit',['data'=>$data]);
    }

    function update(Request $req){
        if(isset($_GET["editname"]))
        {
           $editname=$_GET["editname"];
           $email=$_GET["email"];
           $role=$_GET["role"];
           $password=$_GET["password"];
           $id=$_GET["id"]; 
            $resto = user::where('id',$id)->update(['role'=>$role,'name'=>$editname,'email'=>$email,'password'=>$password]);
            session()->flash('status','user has been edited');
           echo "done";
        }
        else
        echo "wrong";
    }
}
