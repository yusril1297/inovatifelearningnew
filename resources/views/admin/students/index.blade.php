@extends('admin.dashboard')

@section('title', 'Students')

@section('content')
<div class="container">
    <h1>Students</h1>

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
                <th>Enrolled Course</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                   
                    <td>{{ $student->enrollments_count }}</td>
                   
                  
                    <td>
                        <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-warning"><i class="ti ti-pencil"></i></a>
                        <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
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