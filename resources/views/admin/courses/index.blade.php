@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
    <div class=" d-flex justify-content-between align-items-center bg-white rounded-xl shadow-lg p-4 flex flex-col mb-1 ">
        <h1 class="mb-3 " style="font-family: 'Oswald', sans-serif;">Daftar Kelas</h1>
          <!-- Menampilkan pesan sukses -->
     
        <a href="{{ route('admin.courses.create') }}" class="btn btn-success">
            + Tambah Kelas Baru
        </a>
    </div>

    @if($courses->isEmpty())
        <p>No courses available.</p>
    @else
   
        <div class="card-body bg-white rounded-xl shadow-lg p-4" >
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Instructor</th>
                            <th>Kategori</th>
                            <th>Thumbnail</th>
                            <th>Daftar Siswa</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->instructor->name }}</td>
                            <td>{{ $course->category->name }}</td>
                            <td>
                                @if($course->youtube_thumbnail_url)
                                <iframe width="120" height="80" src="{{ $course->youtube_thumbnail_url }}" 
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                                </iframe>
                                @else
                                    No Thumbnail
                                @endif
                            </td>
                            <td>{{ $course->enrollments_count }}</td>
                            <td>{{ $course->price == 0 ? 'Gratis' : 'Rp' . number_format($course->price, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge {{ $course->status == 'approved' ? 'bg-success' : 'bg-warning' }}">
                                    {{ ucfirst($course->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-sm btn-info"><i class="ti ti-eye"></i></a>
                                <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sm btn-warning"><i class="ti ti-pencil"></i></a>
                                <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        
    @endif
</div>
@endsection

@section('styles')
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
@endsection

