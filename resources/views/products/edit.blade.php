@extends('layout')
@section('title','Edit a Product')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
        <h1>Edit a Product</h1>
    </div>
    <div class="flex justify-center pt-8">
        <form action="{{ route('products.update', ['product' => $product->Product_id]) }}" method="POST" enctype="multipart/form-data" class="form bg-white p-6 border-1">

            @csrf
            @method('PUT')

            <div>
                <label for="product_name">Product name</label>
                <input id="product_name" name="product_name" value="{{ $product->product_name }}" type="text">
                @error('product_name')
                    <div class="form_error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <label for="price">Price</label>
                <input id="price" name="price" value="{{ $product->price }}" type="text">
                @error('price')
                    <div class="form_error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <label for="description">Description</label>
                <input id="description" name="description" value="{{ $product->description }}" type="text">
                @error('description')
                    <div class="form_error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <label for="products_count">Product count</label>
                <input id="products_count" name="products_count" value="{{ $product->products_count }}" type="number">
                @error('products_count')
                    <div class="form_error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <label for="Vendor_id">Vendor</label>
                <select id="Vendor_id" name="Vendor_id">
                    @foreach($vendors as $vendor)
                        <option value="{{ $vendor->Vendor_id }}" @if($vendor->Vendor_id === $product->Vendor_id) selected @endif>{{ $vendor->first_name }}{{ $vendor->last_name }}</option>
                    @endforeach
                </select>
                @error('Vendor_id')
                    <div class="form_error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <label for="Type_id">Type</label>
                <select id="Type_id" name="Type_id">
                    @foreach($productTypes as $productType)
                        <option value="{{ $productType->Type_id }}" @if($productType->Type_id === $product->Type_id) selected @endif>{{ $productType->type_name }}</option>
                    @endforeach
                </select>
                @error('Type_id')
                    <div class="form_error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="image">Image</label>
                <input id="image" name="image" type="file">
                @error('image')
                    <div class="form_error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit" value="submit">Submit</button>
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
