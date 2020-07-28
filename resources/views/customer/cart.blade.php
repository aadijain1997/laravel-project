@extends('customer.admin')
@section('content')
<h1>Detail of book</h1> 
<div class="col-sm-6">
    <form method="post" action="/customer/addcart/{{$data->title}}/{{$data->price}}">
    @csrf
    <input type="hidden" class="userid" value="{{$data->id}}">
    <h2> Book name :- {{$data->title}}</h2>
        <div class="form-group">
            <label>No of books </label>
            <input type="number" name="books"  class="form-control books" required placeholder="Enter no of books">
            <span class="help-block number" ></span>
        </div>

        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection