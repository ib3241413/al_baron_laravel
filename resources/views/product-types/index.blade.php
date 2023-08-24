
@extends('layout')
@section('title','Product type')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center">
       <h1>Products type</h1>
    </div>

    <div>
            @if (count($productTypes)>0)

            <ol>
                @foreach($productTypes as $productType )
            {{-- <a href="{{route('product-types.show',['productType'=>$productType->Type_id] ) }}"> --}}
                <a href="{{ route('product-types.show', ['product_type' => $productType->Type_id]) }}">

                <li>
                    <h3>Name:{{$productType->type_name}}<br>
                        




                    </h3>

                </li>
            </a>
            @endforeach
            </ol>
            @else

            <p>There are no Products to display</p>
          @endif


    </div>


@endsection
