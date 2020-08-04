@extends('reviewer1.admin')
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
<h1>List of all books</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">title</th>
      <th scope="col">Attachment</th>
      <th scope="col">Status</th>
      <th scope="col">Comment</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $item)
    <tr>
      <th scope="row">{{$item->name}}</th>
      <td>{{$item->title}}</td>
      <td>{{$item->file}}<a href="/reviewer1/view/{{$item->id}}"><i class="fa fa-eye"></i></a></td>
      <td>{{$item->status_id}}</td>
      <td>{{$item->comment}}</td>
      <td><a href="/reviewer1/edit/{{$item->id}}"><i class="fa fa-edit"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection