@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
    <div class=" bg-white rounded-xl shadow-lg p-4 flex flex-col ">
    <h1>Students</h1>

     <!-- Menampilkan pesan sukses -->
     @if(session('success'))
     <div class="alert alert-success">
         {{ session('success') }}
     </div>
    @endif
    
    
    <div class="card-body bg-white rounded-xl shadow-lg p-4 ">
        <div class="table-responsive">
    <table id="dataTable" class="table table-striped align-middle mb-0">
        <thead class="table-light">
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
    </div>
    </div>
    </div>
</div>

@endsection