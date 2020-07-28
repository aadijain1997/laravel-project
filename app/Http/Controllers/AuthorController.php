<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use App\author;

class AuthorController extends Controller
{
    public function index()
    {
        return view('author/home');
    }
    function authorlist()
    {
        $data = author::all();
        return view('author/list', ["data" => $data]);
    }

    function authoradd(Request $req)
    {
        $resto = new author;
        $resto->name = $req->input('name');
        $resto->title = $req->input('title');
        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $filename = $file->getClientOriginalName();
            $file->move('storage/', $filename);
            $resto->file = $filename;
        }
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
        return view('author/edit', ['data' => $data]);
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
            'name' =>   $req->name,
            'title' =>   $req->title,
            'file'  =>   $resto,
            'price' =>   $req->price,
            'status_id' =>   "not-reviewed",
            'comment' => " "
        );
        $resto = author::where('id', $id)->update($form_data);
        session()->flash('status', 'Author has been updated');
        return redirect('author/list');
    }
}
