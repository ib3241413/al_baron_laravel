@extends('layout')
@section('title','Products')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center">
        <h1>Products</h1>
    </div>

    <form action="{{ route('products.index') }}" method="GET" class="filter-form">
        <label for="type_id" class="filter-label">Filter by Type:</label>
        <select id="type_id" name="type_id" class="filter-select">
            <option value="">All Types</option>
            @foreach($productTypes as $productType)
                <option value="{{ $productType->Type_id }}" @if($selectedType == $productType->Type_id) selected @endif>{{ $productType->type_name }}</option>
            @endforeach
        </select>
         <input type="text" id="search" name="search" placeholder="Search Product" class="filter-input" value="{{ $searchQuery }}">
        <button type="submit" class="filter-button">Search</button>
    </form>
    {{-- This form allows users to select a product type from the dropdown and submit the form to filter the products. The selected option will be pre-selected based on the $selectedType variable passed from the controller. --}}
    
    
    
    
    
    
    
    <div>
        @if (count($products) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Product Count</th>
                        <th>Type</th>
                        <th>Vendor</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->products_count }}</td>
                            <td>{{ $product->type_name }}</td>
                            <td>{{ $product->vendor->first_name }} {{ $product->vendor->last_name }}</td>
                            <td>
                                @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 100px; max-height: 100px;">
                            @else
                                No image available
                            @endif
                            
                            </td>
                            <td>
                                <a href="{{ route('products.show', ['product' => $product->Product_id]) }}" class="btn btn-blue">View</a>
                                <a href="{{ route('products.edit', ['product' => $product->Product_id]) }}" class="btn btn-green">Edit</a>
                                <form action="{{ route('products.destroy', ['product' => $product->Product_id]) }}" method="POST" class="delete-form">
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
            <p>There are no Products to display</p>
        @endif
    </div>
</div>
@endsection
