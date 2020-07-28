@extends('author.admin')
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
      <th scope="col">Name</th>
      <th scope="col">Tiltle</th>
      <th scope="col">Attachment</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
      <th scope="col">Comments</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $item)
    <tr>
      <th scope="row">{{$item->name}}</th>
      <td>{{$item->title}}</td>
      <td>{{$item->file}}</td>
      <td>{{$item->price}}</td>
      <td>{{$item->status_id}}</td>
      <td>{{$item->comment}}</td>
      <td><a href="/author/delete/{{$item->id}}"><i class="fa fa-trash"></i></a>
        <a href="/author/edit/{{$item->id}}"><i class="fa fa-edit"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection