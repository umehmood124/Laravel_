@section('title')
    Contact Page
@endsection

@extends('layout')

@section('content')
    <div class="container">
        <form action="{{ route('contact.store')  }}" method="POST">
            <h1>Contact us</h1>
            <div class="form-group">
                <label for="name" class="me-3" >Name</label>
                <input class="{{ $errors->first('name')?'border border-danger':'null'}} form-control" type="text" name="name" placeholder="Customer Name" value="{{ old('name')}}" >
                <div>
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="me-3 mt-3" >Email</label>
                <input class="{{ $errors->first('email')?'border border-danger':'null'}} form-control" type="email" name="email" id="" placeholder="Email" value="{{ old('email')}}">
                <div>
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="me-3 mt-3">Message</label><br>
                <textarea name="message" cols="100" rows="5" class="{{ $errors->first('message')?'border border-danger':'null'}}form-control" value="{{ old('message')}}"></textarea>
                <div>
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
            @csrf
        </form>
    </div>

@endsection
