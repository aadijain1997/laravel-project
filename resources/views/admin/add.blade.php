@extends('admin.admin')

@section('content')



<h1>Add Users</h1> 
<div class="col-sm-6">
<form method="post" action="/form/post">
        @csrf
        <div class="form-group">
            <label>Name </label>
            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" placeholder="Enter name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Enter email">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Role </label>
            <select name="role" id="role" value="{{old('role')}}" class="form-control">
                <option value="" disabled selected>select Role</option>
                <option value="author">Author</option>
                <option value="reviewer">Reviewer</option>
                <option value="reviewer1">Reviewer1</option>
                <option value="customer">Customer</option>
            </select>
            @error('role')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>password </label>
            <input type="password" name="password"  id="password" class="form-control" placeholder="Enter password">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label> confirm-password </label>
            <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Enter password">
            @error('confirm-password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection