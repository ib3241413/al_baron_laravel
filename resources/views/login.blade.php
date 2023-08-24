@extends('layout')
@section('title','Login')

@section('content')

<div class="login-container">
    <h1>Login</h1>
    @if(\Session::has('message'))
    <div class="alert alert-info">
        {{\Session::get('message')}}
    </div>
    @endif
    <div>
        <form method="POST" action="{{ route('postlogin') }}">
            @csrf
            <div class="form-group mb-3">
                <input type="text" placeholder="Email" id="email" class="form-control" name="email" autofocus>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <input type="password" placeholder="Password" id="password" class="form-control" name="password">
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>
            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-dark btn-block">Sign In</button>
            </div>
        </form>
    </div>
</div>

@endsection