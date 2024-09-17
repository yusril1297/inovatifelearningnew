@extends('instructor.dashboard')

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
             
                
            </tr>
        </thead>

        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{$student->enrollments_count}}</td>
                
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('editstyles')
    <link href="{{ asset('assets/css/edit.css') }}" rel="stylesheet">
@endsection 