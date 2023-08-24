@extends('admins.layout')
@section('title', 'Show admins')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
        <h1>Admin</h1>
    </div>

    <div class="mt-8">
        <table class="admin-table">
            <tbody>
                
                <tr>
                    <td>First Name</td>
                    <td>{{ $admin->first_name }}</td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td>{{ $admin->last_name }}</td>
                </tr>
                <tr>
                    <td>Birth Date</td>
                    <td>{{ $admin->birth_date }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{ $admin->phone }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $admin->email }}</td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>{{ $admin->password }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <a class="edit-btn" href="{{ route('admins.edit', $admin->Admin_id) }}">Edit</a>
        <form action="{{ route('admins.destroy', $admin->Admin_id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn">Delete</button>
        </form>
    </div>
</div>
@endsection
