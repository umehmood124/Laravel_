@extends('layout')
@section('title')
    Customers page
@endsection

@section('content')
    <div class="div container">
        <div class="row">
            <div class="col-12">
                <h1 class="">Customers List</h1>
            </div>
        </div>
        @can('create', App\Models\Customer::class)
                <div class="div">
                    <a href="{{route('customers.create')}}">

                        <button class="btn btn-primary">Create Customer</button>
                    </a>
                </div>
            @endcan
        <div class="div mt-5">
        @foreach ($customers as $customer )
                <div class="row">
                    <div class="col-1"><span>{{$customer->id}}</span></div>
                    <div class="col-1">{{$customer->name}}</span></div>

                    <div class="col-2">{{$customer->company->name}}</span></div>
                    <div class="col-3"><span>{{$customer->email}}</span></div>
                    <div class="col-2"><span>{{$customer->active_user}}</span></div>
                    @can('view', $customer)

                    <div class="col-1"><a href="/customers/{{$customer->id}}"><i class="bi bi-pencil-square"></i></a></div>
                    @endcan
                    @can('delete', $customer)
                    <div class="col-1">
                            <form action="/customers/{{$customer->id}}" method="POST" onsubmit="confirmAction(event)">
                                @method('DELETE')
                                @csrf
                                <button  type="submit" class="btn btn-outline-danger mb-3" >Delete</button>
                            </form>
                        </div>
                    @endcan
                    <br>
                    <br>
                </div>
        @endforeach
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center">
                    {!! $customers->links()!!}
                </div>
            </div>
        </div>

    </div>

@endsection
