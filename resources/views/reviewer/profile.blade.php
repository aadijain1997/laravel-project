@extends('reviewer.admin')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <img src="/avatars/{{$user->avtar}}" class="profile-avatar">
        <h2>
            {{$user->name}} 's Profile
        </h2>
        <form enctype="multipart/form-data" action="/reviewer/profiledata" method="POST">
            <label>Update Profile Image</label>
            <input type="file" name="avtar">
            <input type="hidden" name="_token" value="{{csrf_token() }}">
            <input type="submit" class="pull-right btn btn-sm btn-primary">
        </form>
    </div>
</div>
@endsection