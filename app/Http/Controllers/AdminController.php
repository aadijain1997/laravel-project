<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Mail;
use App\user;
use Auth;
use Image;



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

        $req->validate([
            'name' => 'required|regex:[\s]',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[#?!@$%^&*-]).{6,}$/|required_with:confirm-password|same:confirm-password',
            'confirm-password' => 'required'
        ],
        [
            'name.regex' => 'Please enter only charcter.',
            'password.regex' => 'password must include 1 special charcter and 1 capital letter'
        ]
    );

        $resto=new user;
        $resto->name=$req->input('name');
        $resto->email=$req->input('email');
        $resto->role=$req->input('role');
        $resto->password=Hash::make($req->input('password'));
        $req->session()->flash('status','user added successfully');
        $resto->save();

        dispatch(new SendEmailJob($resto));
        return redirect('/admin/list');
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

    function update(Request $req,$id){
        $req->validate([
            'name' => 'required|regex:[\s]',
            'email' => 'required',
            'role' => 'required'
        ]);
        DB::table('users')->where('id',$id)->update(request()->except(['_token']));
        $req->session()->flash('status','user edited successfully');
        return redirect('/admin/list');
    }

    function avtar(){
        return view('/admin/profile',array('user'=> Auth::user()));
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
        return view('/admin/profile',array('user'=> Auth::user()));
    }
}
