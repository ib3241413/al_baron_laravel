@extends('layout')
@section('title', 'Add Products')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8">
            <h1>Add a new Product</h1>
        </div>
        <div class="form a">
            <form action="{{ route('products.store') }}" method="post" class="form bg-white p-6 border-1" enctype="multipart/form-data">

                @csrf

                <div>
                    <label for="product_name">Product name</label>
                    <input id="product-name" name="product_name" value="{{ old('product_name') }}" type="text">
                    @error('product_name')
                        <div class="form_error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="price">Price</label>
                    <input id="price" name="price" value="{{ old('price') }}" type="text">
                    @error('price')
                        <div class="form_error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="description">Description</label>
                    <input id="description" name="description" value="{{ old('description') }}" type="text">
                    @error('description')
                        <div class="form_error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="products_count">Product count</label>
                    <input id="products_count" name="products_count" value="{{ old('products_count') }}" type="number">
                    @error('products_count')
                        <div class="form_error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- <div>
                    <label for="Vendor_id">Vendor</label>
                    <select id="Vendor_id" name="Vendor_id">
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->Vendor_id }}">{{ $vendor->first_name }}{{ $vendor->last_name }}</option>
                        @endforeach
                    </select>
                    @error('Vendor_id')
                        <div class="form_error">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}
                 
                {{-- <div>
                    <label for="vendor_id">Vendor</label>
                    <input id="vendor_id" name="vendor_id" type="text" value="{{ $vendor ? $vendor->id : '' }}" readonly>
                    <span>{{ $vendor ? $vendor->name : '' }}</span>
                </div> --}}
                
            {{-- 00    <input type="hidden" name="Vendor_id" value="{{ $vendor->Vendor_id }}"> --}}
       {{-- 11     @if(isset($vendor))
            <input type="hidden" name="Vendor_id" value="{{ $vendor->Vendor_id }}">
        @else
            <label for="Vendor_id">Vendor</label>
            <select id="Vendor_id" name="Vendor_id">
                @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->Vendor_id }}">{{ $vendor->first_name }}{{ $vendor->last_name }}</option>
                @endforeach
            </select>
            @error('Vendor_id')
                <div class="form_error">
                    {{ $message }}
                </div>
            @enderror
        @endif --}}
        @if(isset($vendor))
                    <input type="hidden" name="Vendor_id" value="{{ $vendor->Vendor_id }}">
                @else
                    <div>
                        <label for="Vendor_id">Vendor</label>
                        <select id="Vendor_id" name="Vendor_id">
                            @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->Vendor_id }}">{{ $vendor->first_name }}{{ $vendor->last_name }}</option>
                            @endforeach
                        </select>
                        @error('Vendor_id')
                            <div class="form_error">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @endif

                <div>
                    <label for="Type_id">Type</label>
                    <select id="Type_id" name="Type_id">
                        @foreach ($productTypes as $productType)
                            <option value="{{ $productType->Type_id }}">{{ $productType->type_name }}</option>
                        @endforeach
                    </select>
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
