@extends('admin.dashboard')

@section('title', 'Instruktur')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
    <div class=" bg-white rounded-xl shadow-lg p-4 flex flex-col ">
    <h1 class="mb-3" style="font-family: 'Oswald', sans-serif;">Instruktur</h1>

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
                <th>Nama</th>
                <th>Email</th>
                <th>Total Kursus</th>
                <th>Aksi</th>
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
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')"><i class="ti ti-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
    </div>
</div>

@endsection

@section('styles')
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
@endsection  