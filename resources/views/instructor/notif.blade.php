@extends('instructor.dashboard')

@section('title', 'Students')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
    <div class=" bg-white rounded-xl shadow-lg p-4 flex flex-col ">
    <h1><i class="ri-notification-4-line "></i></h1>

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
                <th>Judul</th>
                <th>Isi</th>
             
                
            </tr>
        </thead>

        <tbody>
            @foreach($notifications as $notification)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $notification->title }}</td>
                    <td>{{ $notification->body }}</td>
                
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
    </div>
</div>



@endsection

@section('editstyles')
    <link href="{{ asset('assets/css/edit.css') }}" rel="stylesheet">
@endsection 