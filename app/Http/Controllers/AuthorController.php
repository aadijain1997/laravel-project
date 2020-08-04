<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use App\author;
use Auth;
use Image;

class AuthorController extends Controller
{
    public function index()
    {
        return view('author/home');
    }
    function authorlist()
    {
        $count = DB::table('authors')->count();
        if($count == 0) {
            return view('author/list1');
         }else {
            $data = author::all();
            return view('author/list', ["data" => $data]);
         }
    }

    function authoradd(Request $req)
    {
        $resto = new author;
        $resto->name = $req->input('name');
        $resto->name = implode(',', $resto->name);
        $resto->title = $req->input('title');
        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $filename = $file->getClientOriginalName();
            $file->move('storage/', $filename);
            $resto->file = $filename;
        }
        $resto->reviewer_name = $req->input('reviewer_name');
        $resto->price = $req->input('price');
        $req->session()->flash('status', 'book added successfully');
        $resto->save();
        return redirect('author/list');
    }
    function delete($id)
    {
        author::find($id)->delete();
        session()->flash('status', 'Author has been deleted');
        return redirect('author/list');
    }

    function edit($id)
    {
        $data = author::find($id);
        return view('author/edit', ['data' => $data ]);
    }
    function update(Request $req, $id)
    {
        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $filename = $file->getClientOriginalName();
            $file->move('upload', $filename);
            $resto = $filename;
        }
        $form_data = array(
            'name' =>   implode(',', $req->name),
            'file'  =>   $resto,
            'reviewer_name' =>   $req->reviewer_name,
            'price' =>   $req->price,
            'status_id' =>   "Pending",
            'comment' => " "
        );
        $resto = author::where('id', $id)->update($form_data);
        session()->flash('status', 'Author has been updated');
        return redirect('author/list');
    }

    function avtar(){
        return view('/author/profile',array('user'=> Auth::user()));
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
        return view('/author/profile',array('user'=> Auth::user()));
    }
}
