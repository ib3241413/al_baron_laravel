@extends('layout')
@section('title', 'Show Product Type')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
        <h1>Product Type</h1>
    </div>

    <div class="mt-8">
        <h3>
            Name: {{ $productType->type_name }}
        </h3>
    </div>

    <div>
        <a class="edit-btn" href="{{ route('product-types.edit', $productType->Type_id) }}">Edit</a>

        <form action="{{ route('product-types.destroy', $productType->Type_id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="delete-btn" value="Delete">
        </form>
    </div>
</div>

@endsection
