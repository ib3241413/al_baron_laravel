@extends('layout')
@section('title','Create Complement')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
       <h1>Create Complaint</h1>
    </div>
    {{-- <div class="flex justify-center pt-8"> --}}
        <div class="form a">

            <form action="{{route('complaints.store')}}" method="post" class="form bg-white p-6 border-1">
                    @csrf
                    


                    <div>
                        <label for="description">description</label>
                        <input id="description" name="description"  type="text">
                        @error('description')
                                <div class="form_error">
                                    {{$message}}
                                </div>
                        @enderror
                    </div>
                    <div>
                        <label for="type">Type</label>
                        <input id="type" name="type"  type="text">
                        @error('type')
                                <div class="form_error">
                                    {{$message}}
                                </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="submit-btn" value="submit">Submit</button>
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

