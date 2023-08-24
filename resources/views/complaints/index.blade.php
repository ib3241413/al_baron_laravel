@extends('admins.layout')
@section('title', 'Complaint')

@section('content')
<div class="container">
    <h1 class="title">Complaint</h1>

    <div class="admin-table">


        @if (count($complaints) > 0)
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Type</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($complaints as $complaint)
                <tr>
                    <td>{{ $complaint->description }}</td>
                    <td>{{ $complaint->type }}</td>

                  
                    <td>
                        <a href="{{ route('complaints.show', ['complaint' => $complaint->Complaint_id]) }}" class="btn btn-blue">View</a>
                      

                        <form action="{{ route('complaints.destroy', ['complaint' => $complaint->Complaint_id]) }}" method="POST" class="delete-form">
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
        <p>There are no complaints to display</p>
        @endif
    </div>
</div>
@endsection
