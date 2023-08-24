
@extends('layout')
@section('title','Orders')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center">
       <h1>Orders</h1>
    </div>

    <div>

        @if (count($orders)>0)

        <ol>
            @foreach($orders as $order )

            <li>
                <h3>
                    Customer ID:  {{$order->Customer_id}}<br>
                    Customer Name: {{$order->first_name}} {{$order->last_name}}<br>
                    Customer Email: {{$order->email}}<br>
                    Phone: {{$order->phone}}<br>
                    date time: {{$order->expected_time}}<br>
                    Expected Time: {{$order->expected_time}}<br>
                    Quantity: {{$order->quantity}}<br>
                    Product_id: {{$order->Product_id}}<br>
                    Vendor_id: {{$order->Vendor_id}}<br>

                </h3>
                </li>

            <form action="{{route('orders.destroy',$order->Order_id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="delete-btn" value="delete">
            </form>
            @endforeach
            </ol>

            @else

            <p>There are no Orders to display</p>
          @endif


    </div>


@endsection
