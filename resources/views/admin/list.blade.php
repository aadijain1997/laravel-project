@extends('admin.admin')
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
<h1>List of all users</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $item)
    <tr>
      <th scope="row">{{$item->name}}</th>
      <td>{{$item->email}}</td>
      <td>{{$item->role}}</td>
      <td><a href="/admin/delete/{{$item->id}}"><i class="fa fa-trash"></i></a>
        <a href="/admin/edit/{{$item->id}}"><i class="fa fa-edit"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection