@extends('admins.layout')
@section('title', 'Edit an Admin')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
        <h1>Edit an Admin</h1>
    </div>
    <div class="flex justify-center pt-8">
        <form action="{{ route('admins.update', ['admin' => $admin->Admin_id]) }}" method="POST" class="form bg-white p-6 border-1">
            @csrf
            @method('PUT')
            <div>
                <label for="first_name">First Name</label>
                <input id="first_name" name="first_name" value="{{ $admin->first_name }}" type="text">
                @error('first_name')
                <div class="form_error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <label for="last_name">Last Name</label>
                <input id="last_name" name="last_name" value="{{ $admin->last_name }}" type="text">
                @error('last_name')
                <div class="form_error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <label for="birth_date">Birth Date</label>
                <input id="birth_date" name="birth_date" value="{{ $admin->birth_date }}" type="date">
                @error('birth_date')
                <div class="form_error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <label for="phone">Phone</label>
                <input id="phone" name="phone" value="{{ $admin->phone }}" type="text">
                @error('phone')
                <div class="form_error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <label for="email">Email</label>
                <input id="email" name="email" value="{{ $admin->email }}" type="text">
                @error('email')
                <div class="form_error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input id="password" name="password" value="{{ $admin->password }}" type="text">
                @error('password')
                <div class="form_error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <label for="address">Address</label>
                <input id="address" name="address" value="{{ $admin->address }}" type="text">
                @error('address')
                <div class="form_error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="submit-btn">EDIT</button>
            </div>
            @if (session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
            @endif
        </form>
    </div>
</div>
@endsection
