@extends('layout')

@section('content')
    <div class="container">
        <h1>Edit {{$customer->name}} Detail</h1>
        <div class="row">
            <div class="col-12">
                <form action="/customers/{{$customer->id}}" method="POST" enctype="multipart/form-data">
{{--                    @method('PATCH')--}}
                    {{ method_field('PATCH') }}
                    @include('customers.form')
                    <button type="submit" class="btn btn-primary mt-2"> Edit Customer Detail</button>
                </form>

            </div>
        </div>
    </div>
@endsection
