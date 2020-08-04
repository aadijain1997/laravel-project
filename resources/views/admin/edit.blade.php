@extends('admin.admin')

@section('content')
<h1>Edit users</h1>
<div class="col-sm-6">
    <form class="formedit">
        @csrf
        <input type="hidden" class="userid" value="{{$data->id}}">
        <div class="form-group editname">
            <label>Name </label>
            <input type="text" name="name" id="name" class="form-control editname" value="{{$data->name}}" placeholder="Enter name">
            <span class="help-block name" ></span>
        </div>
        <div class="form-group editemail">
            <label>Email</label>
            <input type="email" name="email" id="email" class="form-control editemail" value="{{$data->email}}" placeholder="Enter email">
            <span class="help-block email" ></span>
        </div>
        <div class="form-group">
            <label>Role </label>
            <!-- <input type="text" name="role" id="role" class="form-control editrole" value="{{$data->role}}" placeholder="Enter role"> -->
            <select name="role" id="role" class="form-control editrole" value="{{$data->role}}">
                <option></option>
                <option value="author" {{ old('role', $data->role) == 'author' ? 'selected' : '' }}>Author</option>
                <option value="reviewer" {{ old('role', $data->role) == 'reviewer' ? 'selected' : '' }}>Reviewer</option>
                <option value="reviewer1" {{ old('role', $data->role) == 'reviewer1' ? 'selected' : '' }}>Reviewer1</option>
                <option value="customer" {{ old('role', $data->role) == 'customer' ? 'selected' : '' }}>Customer</option>
            </select>
            <span class="help-block role" ></span>
        </div>
       
        <div class="form-group editpass">
            <label>password </label>
            <input type="password" name="password" id="password" class="form-control editpassword" value="{{$data->password}}" placeholder="Enter password">
            <span class="help-block password" ></span>
        </div>
        <button type="button" class="btn btn-primary edit" onclick="editform();">Submit</button>
    </form>
</div>

@endsection