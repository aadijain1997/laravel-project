@extends('reviewer1.admin')

@section('content')
<h1>Name of author :- {{$data->name}}</h1>
<h2> Title :- {{$data->title}}</h2>

<p>
    <iframe class="image" src="{{url('/storage/'.$data->file)}}"></iframe>
</p>
@endsection