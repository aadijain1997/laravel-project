@extends('author.admin')

@section('content')
<h1>Add Book</h1>

<div class="col-sm-6">
    <form method="post" action="/author/editadd" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name of author </label><br>
            <select class="selectpicker form-control" multiple  name="name[]">
                <option value="aditya" selected="selected">{{ Auth::user()->name }}</option>
                <option value="ashish">Ashish</option>
                <option value="ankit">Ankit</option>
            </select>
            <span class="help-block name"></span>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required class="form-control"  placeholder="Enter title">
            <span class="help-block title"></span>
        </div>
        <div class="form-group">
            <label>Attachment </label>
            <input type="file" name="file" id="file" class="form-control" required accept=".doc,.docx, .pdf,.jpg,.jpeg" />
            <span class="help-block file"></span>
        </div>
        <div class="form-group">
            <label>Reviewer Name </label>
            <!-- <input type="text" name="reviewer_name" id="reviewer_name" class="form-control" required> -->
            <select class="form-control" required name="reviewer_name" id="reviewer_name" >
                <option ></option>
                <option value="reviewer">reviewer</option>
                <option value="reviewer1">reviewer1</option>
            </select>
            <span class="help-block reviewer_name"></span>
        </div>
        <div class="form-group">
            <label>Price </label>
            <input type="number" name="price" id="price" required class="form-control" placeholder="Enter Price">
            <span class="help-block file"></span>
        </div>
        <button type="submit" class="btn btn-primary ">Submit</button>
    </form>
</div>

@endsection