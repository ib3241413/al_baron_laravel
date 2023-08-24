@extends('layout')
@section('title','Show customers')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
       <h1>Customer</h1>
    </div>

    <div class="mt-8 ">
            <h3>
                first_name:{{$customer->first_name}}<br>
                last_name: {{$customer->last_name}}<br>
                birth_date: {{$customer->birth_date}}<br>
                phone: {{$customer->phone}}<br>
                email: {{$customer->email}}<br>
                password: {{$customer->password}}<br>
                address: {{$customer->address}}<br>
             </h3>


    </div>
     <div>
        <a class="edit-btn" href="{{route('customers.edit',$customer->Customer_id)}} ">edit</a>


       <form action="{{route('customers.destroy',$customer->Customer_id)}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="delete-btn" value="delete">
        </form>

    </div>
@endsection

