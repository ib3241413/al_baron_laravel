@extends('layout')
@section('title','Show Vendors')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
       <h1>Vendor</h1>
    </div>

    <div class="mt-8 ">
            <h3>
                first_name:{{$vendor->first_name}}<br>
                last_name: {{$vendor->last_name}}<br>
                birth_date: {{$vendor->birth_date}}<br>
                phone: {{$vendor->phone}}<br>
                email: {{$vendor->email}}<br>
                password: {{$vendor->password}}<br>
                address: {{$vendor->address}}<br>
             </h3>


    </div>
     <div>
        <a class="edit-btn" href="{{route('vendors.edit',$vendor->Vendor_id)}} ">edit</a>


       <form action="{{route('vendors.destroy',$vendor->Vendor_id)}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="delete-btn" value="delete">
        </form>

    </div>
@endsection

