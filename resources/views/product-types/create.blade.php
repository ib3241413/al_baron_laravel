@extends('layout')
@section('title','Add prduct type')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
       <h1>Add a new Product Type</h1>
    </div>
    {{-- <div class="flex justify-center pt-8"> --}}
        <div class="form a">

            <form action="{{route('product-types.store')}}" method="post" class="form bg-white p-6 border-1">
                    @csrf
                  


                    <div>
                        <label for="type_name">Type name</label>
                        <input id="type_name" name="type_name"   type="text">
                        @error('product_name')
                                <div class="form_error">
                                    {{$message}}
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

