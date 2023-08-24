@extends('admins.layout')
@section('title', 'Admins')

@section('content')
<div class="container">
    <h1 class="title">Admins</h1>

    <div class="admin-table">

        <a href="{{ route('products.index') }}" class="btn btn-add">Products </a>
        <a href="{{ route('orders.index') }}" class="btn btn-add">Orders </a>
        <a href="{{ route('complaints.index') }}" class="btn btn-add">complaints </a>
        <a href="{{ route('customers.index') }}" class="btn btn-add">Customers </a>
        <a href="{{ route('vendors.index') }}" class="btn btn-add">Vendors </a>
        <a href="{{route('admins.create')}}"class="btn btn-add">Add Admin</a>


        @if (count($admins) > 0)
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birth Date</th>
                    <th>Phone</th>
                    <th>Email</th>
               
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->first_name }}</td>
                    <td>{{ $admin->last_name }}</td>
                    <td>{{ $admin->birth_date }}</td>
                    <td>{{ $admin->phone }}</td>
                    <td>{{ $admin->email }}</td>
                   
                    <td>{{ $admin->address }}</td>
                    <td>
                        <a href="{{ route('admins.show', ['admin' => $admin->Admin_id]) }}" class="btn btn-blue">View</a>
                        <a href="{{ route('admins.edit', ['admin' => $admin->Admin_id]) }}" class="btn btn-green">Edit</a>
                        <a href="{{ route('admins.create') }}" class="btn btn-add">Add </a>

                        <form action="{{ route('admins.destroy', ['admin' => $admin->Admin_id]) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-red">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>There are no Admins to display</p>
        @endif
    </div>
</div>
@endsection
