@extends('author.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    Hey {{ Auth::user()->name }} , here you can create your own books.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection