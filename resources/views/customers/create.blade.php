@extends('layout')

@section('content')
    <div class="container">
        <h1>Create customer</h1>
    <form action="{{route('customers.store')}}" method="POST" enctype="multipart/form-data">
    @include('customers/form')
        <div class="div">
            <button class="btn btn-primary mt-3">Create Customer</button>
        </div>
    </form>
    </div>
@endsection
