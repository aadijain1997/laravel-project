@extends('admin.admin')

@section('content')
<h1>Add Users</h1> 
<div class="col-sm-6">
    <form class="formadd">
        @csrf
        <div class="form-group addname">
            <label>Name </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
            <span class="help-block name" ></span>
        </div>
        <div class="form-group addemail">
            <label>Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
            <span class="help-block email" ></span>
        </div>
        <div class="form-group addrole">
            <label>Role </label>
            <select name="role" id="role" class="form-control">
                <option  selected="selected"></option>
                <option value="author">Author</option>
                <option value="reviewer">Reviewer</option>
                <option value="reviewer1">Reviewer1</option>
                <option value="customer">Customer</option>
            </select>
            <span class="help-block role" ></span>
        </div>
        <div class="form-group addpass">
            <label>password </label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
            <span class="help-block password" ></span>
        </div>
        <button type="button" class="btn btn-primary add" onclick=checkform();>Submit</button>
    </form>
</div>

@endsection