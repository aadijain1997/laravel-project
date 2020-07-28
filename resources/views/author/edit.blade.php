@extends('author.admin')

@section('content')
<h1>Edit Book</h1>
<div class="col-sm-6">
    <form method="post" action="/edit/data/{{$data->id}}" enctype="multipart/form-data">
    <input type="hidden" class="userid" value="{{$data->id}}">
        @csrf
        <div class="form-group">
            <label>Name </label>
            <input type="text" name="name"  class="form-control name" value="{{$data->name}}" required placeholder="Enter name">
            <span class="help-block name" ></span>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title"  class="form-control email" value="{{$data->title}}" required placeholder="Enter title">
            <span class="help-block email" ></span>
        </div>
        <div class="form-group">
            <label>Attachment </label>
            <input type="file" name="file" class="form-control file" value="{{ $data->file }}" required placeholder="Enter Attachment">
            <span class="help-block role" ></span>
        </div>
        <div class="form-group">
            <label>Price </label>
            <input type="number" name="price"  class="form-control price" value="{{$data->price}}" required placeholder="Enter Price">
            <span class="help-block role" ></span>
        </div>
        <button class="btn btn-primary ">Submit</button>
    </form>
</div>

@endsection