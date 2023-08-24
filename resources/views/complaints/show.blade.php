@extends('admins.layout')
@section('title', 'Show Complaint')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
        <h1>Complaint</h1>
    </div>

    <div class="mt-8">
        <table class="admin-table">
            <tbody>
                
                <tr>
                    <td>Description</td>
                    <td>{{ $complaint->description }}</td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>{{ $complaint->type }}</td>
                </tr>
                <tr>
                    <td>Customer</td>
                    <td>{{ "her is the name of cutsomer" }}</td>
                </tr>
                
            </tbody>
        </table>
    </div>

    <div>
        
        <form action="{{ route('complaints.destroy', $complaint->Complaint_id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn">Delete</button>
        </form>

    </div>
</div>
@endsection
