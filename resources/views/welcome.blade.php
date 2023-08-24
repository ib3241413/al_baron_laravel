@extends('layout')
@section('title','Welcome')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
        <h1>Welcome</h1>
    </div>

    <div class="mt-8 ">
        @if(Auth::guard('web')->check())
        Welcome: {{ Auth::user()->first_name }}
    @elseif(Auth::guard('admin')->check())
        Welcome Admin: {{ Auth::guard('admin')->user()->first_name }}
    @elseif(Auth::guard('vendor')->check())
        Welcome Vendor: {{ Auth::guard('vendor')->user()->first_name }}
    @else
        You are not logged in.
    @endif

@endsection
