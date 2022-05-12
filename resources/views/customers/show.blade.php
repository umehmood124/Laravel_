@extends('layout')

@section('title')
    Detail Of {{$customer->name}}
@endsection

@section('content')
    <div class="div container">
        <h1>Detail Of {{$customer->name}}</h1>
    </div>


    <div class="div container mt-5">
        <div class="row">
            @if($customer->image)
                <div class="row">
                    <div class="col-12 mb-3">
                        <img src="{{ asset('storage/' . $customer->image) }}" alt="customer images" class="img-thumbnail">
                    </div>
                </div>
            @endif
        </div>
        <div class="row ">
            <div class="col-6">
                <p><strong>Name</strong>: {{ $customer->name }}</p>
                <p><strong>Email</strong>: {{ $customer->email }}</p>
                <p><strong>Status</strong>: {{ $customer->active_user }}</p>
                <p><strong>Company</strong>: {{ $customer->company->name }}</p>
            </div>
            <div class="col-5">
                <a href="/customers/{{$customer->id}}/edit"><button type="button" class="btn btn-secondary mt-3 ">Edit Customer</button></a>
            </div>
        </div>

    </div>
@endsection
