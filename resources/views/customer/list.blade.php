@extends('customer.admin')
@section('content')
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
<h1>List of all Books</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Books</th>
      <th scope="col">Price</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $item)
    <tr>
      <th scope="row">{{$item->title}}</th>
      <td>{{$item->file}}</td>
      <td>{{$item->price}}</td>
      <td><a href="/customer/add/{{$item->id}}"><i class="fa fa-shopping-cart"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection