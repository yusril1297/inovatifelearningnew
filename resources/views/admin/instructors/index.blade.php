@extends('admin.dashboard')

@section('title', 'Instructor')

@section('content')
<div class="container">
    <h1>Instructor</h1>

     <!-- Menampilkan pesan sukses -->
     @if(session('success'))
     <div class="alert alert-success">
         {{ session('success') }}
     </div>
    @endif
    
    
    <table id="dataTable" class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Total Course</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($instructors as $instructor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $instructor->name }}</td>
                    <td>{{ $instructor->email }}</td>
                    <td>{{ $instructor->courses_count}}</td>
                  
                    <td>
                        
                        <form action="{{ route('admin.instructors.destroy', $instructor->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="ti ti-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('editstyles')
    <link href="{{ asset('assets/css/edit.css') }}" rel="stylesheet">
@endsection 