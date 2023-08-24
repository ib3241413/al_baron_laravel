@extends('layout')
@section('title', 'Edit a Product Type')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
        <h1>Edit a Product Type</h1>
    </div>
    <div class="flex justify-center pt-8">

        <form action="{{ route('product-types.update', ['product_type' => $productType->Type_id]) }}" method="POST"
            class="form bg-white p-6 border-1">
            @csrf
            @method('PUT')

            <div>
                <label for="type_name">Type Name</label>
                <input id="type_name" name="type_name" value="{{ $productType->type_name }}" type="text">
                @error('type_name')
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
