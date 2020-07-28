<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin', 'adminController@index')->name('admin');
    Route::view('/admin/home','/admin/home');
    Route::view('/admin/list','/admin/list');
    Route::get('/admin/list','adminController@list');
    Route::view('/admin/add','/admin/add');
    Route::post('/form/post','adminController@add');
    Route::get('/admin/delete/{id}','adminController@delete');
    Route::get('/admin/edit/{id}','adminController@edit');
    Route::get('/edit/form/','adminController@update');
});

Route::group(['middleware'=>'author'],function(){
    Route::get('/author', 'authorController@index')->name('author');
    Route::view('/author/home','author/home');
    Route::view('/author/list','author/list');
    Route::get('/author/list','authorController@authorlist');
    Route::view('/author/add','author/add');
    Route::post('/author/editadd','authorController@authoradd');
    Route::get('/author/delete/{id}','authorController@delete');
    Route::get('/author/edit/{id}','authorController@edit');
    Route::post('/edit/data/{id}','authorController@update');
});

Route::group(['middleware'=>'reviewer'],function(){
    Route::get('/reviewer', 'reviewerController@index')->name('reviewer');
    Route::view('/reviewer/home','/reviewer/home');
    Route::view('/reviewer/list','/reviewer/list');
    Route::get('/reviewer/list','reviewerController@reviewerlist');
    Route::get('/reviewer/edit/{id}','reviewerController@edit');
  Route::get('/reviewer/view/{id}','reviewerController@view');
    Route::get('/edit/reviewer/','reviewerController@update');
});

Route::group(['middleware'=>'customer'],function(){
    Route::get('/customer', 'customerController@index')->name('customer');
    Route::view('/customer/home','/customer/home');
    Route::view('/customer/list','/customer/list');
    Route::get('/customer/list','customerController@customerlist');
    Route::get('/customer/add/{id}','customerController@cart');
    Route::get('/customer/editcart','CustomerController@editcart');
    Route::view('/customer/cart','/customer/cart');
    Route::view('/customer/buy','/customer/buy');
    Route::get('/customer/buy','CustomerController@customerbuy');
    Route::post('/customer/addcart/{title}/{price}','customerController@addcart');
    Route::get('/customer/buydelete/{id}','customerController@buydelete');
    Route::get('/customer/buynow','customerController@buynow');
    Route::view('/customer/finalproduct','/customer/finalproduct');
    Route::post('/form/buynow','customerController@finalproduct');
    Route::get('/customer/back','customerController@back');
});

