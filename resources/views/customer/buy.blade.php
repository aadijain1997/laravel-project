@extends('customer.admin')
@section('content')

@if(Session::get('key'))
<div class="alert">
@if(Session::get('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
</div>
<h1>Your Cart is here</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Books</th>
      <th scope="col">price</th>
      <th scope="col">total</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $item)
    <tr>
      <th scope="row">{{$item->title}}</th>
      <td>{{$item->books}}</td>
      <td>{{$item->price}}</td>
      <td>{{$item->total}}</td>
      <td><a href='/customer/buydelete/{{$item->id}}'><i class="fa fa-remove"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="buy">
  <a href="/customer/buynow"><button class="btn btn-primary">Buy now</button></a>
</div>

@else
<h1 class="nothing">Nothing in Cart </h1>
@endif
@endsection



