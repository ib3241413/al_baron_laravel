@extends('layout')
@section('title','Show Products')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
        <h1>Product</h1>
    </div>

    <div class="mt-8">
        <h3>
            Name: {{ $product->product_name }}<br>
            Price: {{ $product->price }}<br>
            Description: {{ $product->description }}<br>
            Count: {{ $product->products_count }}<br>
            Type: {{ $product->productType->type_name }}<br>
            Vendor: {{ $product->vendor->first_name }}{{ $product->vendor->last_name }}<br>
            @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 100px; max-height: 100px;">
        @else
            No image available
        @endif
        </h3>
    </div>

    <div>
        <a class="edit-btn" href="{{ route('products.edit', $product->Product_id) }}">Edit</a>

        <form action="{{ route('products.destroy', $product->Product_id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="delete-btn" value="Delete">
        </form>
    </div>
</div>

@endsection
