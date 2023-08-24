<style>
    .flex {
        display: flex;
        justify-content: center;
    }

    h1 {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 1rem;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 0.5rem;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    a {
        text-decoration: none;
        color: #333;
    }

    a:hover {
        text-decoration: underline;
    }

    p {
        text-align: center;
    }
</style>

@extends('layout')
@section('title','Products')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center">
        <h1>Customers</h1>
    </div>

    <div>
        @if (count($customers)>0)
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birth Date</th>
                    <th>Phone</th>
                    <th>Email</th>
                    
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{$customer->first_name}}</td>
                    <td>{{$customer->last_name}}</td>
                    <td>{{$customer->birth_date}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->email}}</td>
                   
                    <td>{{$customer->address}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>There are no Customers to display</p>
        @endif
    </div>
</div>
@endsection
