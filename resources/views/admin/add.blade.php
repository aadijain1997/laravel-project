@extends('admin.admin')

@section('content')
<h1>Add Users</h1> 
<div class="col-sm-6">
    <form>
        <div class="form-group">
            <label>Name </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
            <span class="help-block name" ></span>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
            <span class="help-block email" ></span>
        </div>
        <div class="form-group">
            <label>Role </label>
            <input type="text" name="role" id="role" class="form-control" placeholder="Enter Role">
            <span class="help-block role" ></span>
        </div>
        <div class="form-group">
            <label>password </label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
            <span class="help-block password" ></span>
        </div>
        <button class="btn btn-primary add">Submit</button>
    </form>
</div>

@endsection