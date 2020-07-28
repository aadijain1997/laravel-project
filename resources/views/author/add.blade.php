@extends('author.admin')

@section('content')
<h1>Add Book</h1> 

<div class="col-sm-6">
    <form method="post" action="/author/editadd" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label>Name of author </label>
            <input type="text" name="name" id="name" class="form-control" required placeholder="Enter name">
            <span class="help-block name" ></span>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" id="title" class="form-control" required placeholder="Enter title">
            <span class="help-block title" ></span>
        </div>
        <div class="form-group">
            <label>Attachment </label>
            <input type="file" name="file"  id="file" class="form-control" required accept=".doc,.docx, .pdf,.jpg,.jpeg" />
            <span class="help-block file" ></span>
        </div>
        <div class="form-group">
            <label>Price </label>
            <input type="number" name="price"  id="price" class="form-control" required placeholder="Enter Price">
            <span class="help-block file" ></span>
        </div>
        <button type="submit" class="btn btn-primary ">Submit</button>
    </form>
</div>

@endsection