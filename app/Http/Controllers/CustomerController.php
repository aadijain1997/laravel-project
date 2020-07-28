<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\author;
use App\cart;

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
        $resto=new cart;
        $resto->title=$title;
        $resto->books=$req->input('books');
        $resto->price=$price;
        $resto->total=$req->input('books')*$price;
        session()->flash('status', 'Item added to cart');
        session(['key'=>'value']);
        $resto->save();
        return redirect('/customer/list');
    }
    public function customerbuy()
    {
        $data =cart::all();
        return view('/customer/buy', ["data" => $data]);
    }

    public function buydelete($id)
    {
        cart::find($id)->delete();
        session()->flash('status',' this item is deleted');
        return redirect('/customer/buy');
    }

    public function buynow()
    {
        $data=DB::table("carts")->get()->sum("books");
        $sum=DB::table("carts")->get()->sum("total");
        return view("/customer/buynow")->with(["data" => $data , "sum" => $sum]);
    }

    public function finalproduct()
    {
        DB::table('carts')->delete();
        session()->forget('key');
        return "done";
    }

    public function back()
    {
        
        return view("/customer/home");
    }
}
