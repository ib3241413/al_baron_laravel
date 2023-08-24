@extends('layout')
@section('title','register')

@section('content')

<div class="form">
    <h1>Register</h1>
    <form action="{{route('postsignup')}}" method="post" class="bg-white p-6 border-1">
        @csrf
        <div>
            <label for="first_name">First Name</label>
            <input id="first_name" name="first_name" value="{{old('first_name')}}" type="text">
            @error('first_name')
            <div class="form_error">
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="last_name">Last Name</label>
            <input id="last_name" name="last_name" value="{{old('last_name')}}" type="text">
            @error('last_name')
            <div class="form_error">
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="birth_date">Birth Date</label>
            <input id="birth_date" name="birth_date" value="{{old('birth_date')}}" type="date">
            @error('birth_date')
            <div class="form_error">
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="phone">Phone</label>
            <input id="phone" name="phone" value="{{old('phone')}}" type="text">
            @error('phone')
            <div class="form_error">
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input id="email" name="email" value="{{old('email')}}" type="text">
            @error('email')
            <div class="form_error">
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input id="password" name="password" value="{{old('password')}}" type="text">
            @error('password')
            <div class="form_error">
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="address">Address</label>
            <input id="address" name="address" value="{{old('address')}}" type="text">
            @error('address')
            <div class="form_error">
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <button type="submit" value="submit">Submit</button>
        </div>
        @if (session('error'))
        <div class="alert-error">
            {{ session('error') }}
        </div>
        @endif
    </form>
</div>

@endsection