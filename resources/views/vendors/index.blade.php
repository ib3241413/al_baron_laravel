
@extends('layout')
@section('title','Vendors')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center">
       <h1>Vendors</h1>
    </div>

    <div>

        @if (count($vendors)>0)

        <ol>
            @foreach($vendors as $vendor )
        <a href="{{route('vendors.show',['vendor'=>$vendor->Vendor_id] ) }}">
            <li>
                <h3>first_name:{{$vendor->first_name}}<br>
                    last_name: {{$vendor->last_name}}<br>
                    birth_date: {{$vendor->birth_date}}<br>
                    phone: {{$vendor->phone}}<br>
                    email: {{$vendor->email}}<br>
                    
                    address: {{$vendor->address}}<br>

                </h3>


                </li>
            </a>
            @endforeach
            </ol>
            @else

            <p>There are no Vendors to display</p>
          @endif


    </div>


@endsection
