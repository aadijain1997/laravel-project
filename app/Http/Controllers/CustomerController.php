<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\author;
use App\cart;
use App\oder;
use Auth;
use Image;

class CustomerController extends Controller
{
    public function index()
    {
        return view('/customer/home');
    }
    function customerlist()
    {
        $data= author::where('status_id','Approved')->get();
        return view('/customer/list', ["data" => $data]);
    }
    public function cart($id,Request $req)
    {
        $data = author::find($id);
        return view('/customer/cart', compact('data'));

    }
    public function addcart($title,$price,Request $req)
    {
        $user = cart::where('title', '=', $title)->first();
        if ($user === null) {
            $resto=new cart;
            $resto->title=$title;
            $resto->books=$req->input('books');
            $resto->price=$price;
            $resto->total=$req->input('books')*$price;
            session()->flash('status', 'Item added to cart');
            $resto->save();
            author::where('title',$title)->update(['status'=>'Already added']);
            author::where('title',$title)->update(['no_of_oders'=>$resto->books]);
            return redirect('/customer/list');
        }
        else{
            cart::where('title',$title)->update(['books'=>$req->input('books')]);
            author::where('title',$title)->update(['no_of_oders'=>$req->input('books')]);
            session()->flash('status', 'books updated');
            return redirect('/customer/list');
        }
    }
    public function customerbuy()
    {
        $count = DB::table('carts')->count();
        if($count == 0) {
            return view('/customer/buy1');
         }else {
            $data = cart::all();
            return view('/customer/buy', ["data" => $data]);
         }
    }

    public function buydelete($id,$title)
    {
        cart::find($id)->delete();
        author::where('title',$title)->update(['status'=>' ','no_of_oders'=>  '']);
        session()->flash('status',' this item is deleted');
        return redirect('/customer/buy');
    }

    public function buynow()
    {
        $data=DB::table("carts")->get()->sum("books");
        $sum=DB::table("carts")->get()->sum("total");
        return view("/customer/buynow")->with(["data" => $data , "sum" => $sum ]);
    }

    public function finalproduct(Request $req)
    {
        $title=cart::pluck('title');
       
        $books=cart::pluck('books');
        $total=cart::pluck('total');
        $resto=new oder;
        $resto->title=$title;
        $resto->books=$books;
        $resto->total=$total;
        $resto->save();
        foreach($title as $titles)
        author::where('title',$titles)->update(['status'=>' ','no_of_oders'=>  '']);
        DB::table('carts')->delete();
        return "done";
    }

    public function back()
    {
        
        return view("/customer/home");
    }

    function avtar(){
        return view('/customer/profile',array('user'=> Auth::user()));
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
        return view('/customer/profile',array('user'=> Auth::user()));
    }

    function history(){
        $count = DB::table('oders')->count();
        if($count == 0) {
            return view('/customer/history');
        }
        if($count <= 7){
            $data = oder::all();
            return view('/customer/recent', compact('data'));
        }
        if($count > 7){
            oder::orderBy('id')->limit(1)->delete();
            $data = oder::all();
            return view('/customer/recent', compact('data'));
        }
        
    }

    function historydelete($id){
        oder::find($id)->delete();
        session()->flash('status',' this item is deleted');
        return redirect('/customer/recent');
    }
}
