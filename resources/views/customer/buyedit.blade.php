@extends('customer.admin')
@section('content')
<h1>Detail of book</h1> 
<div class="col-sm-6">
    <form>
    <input type="hidden" class="userid" value="{{$data->id}}">
    <h2> Book name :- {{$data->title}}</h2>
        <div class="form-group">
            <label>No of books </label>
            <input type="number" name="books" class="form-control books" value="{{$data->books}}" required placeholder="Enter no of books">
            <span class="help-block books" ></span>
        </div>

        <button class="btn btn-primary aditya">Submit</button>
    </form>
</div>
@endsection