@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-5">Admin Courses</h1>

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('admin.courses.create') }}" class="btn btn-success">+ Add New Course</a>
      
    </div>

    @if($courses->isEmpty())
        <p>No courses available.</p>
    @else
    <table id="dataTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Instructor</th>
                <th>Category</th>
                <th>Enrolled Student</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $course->title }}</td>
                <td>{{ $course->instructor->name }}</td>
                <td>{{ $course->category->name }}</td>
                <td>{{ $course->students_count }}</td> <!-- Example for enrolled students count -->
                <td>{{ $course->price == 0 ? 'Gratis' : 'Rp' . number_format($course->price, 0, ',', '.') }}</td>
                <td>
                    <span class="badge {{ $course->status == 'approved' ? 'bg-success' : 'bg-warning' }}">
                        {{ ucfirst($course->status) }}
                    </span>
                </td>

                <td>
                    
                        
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info"><i class="ti ti-eye"></i></a>
                    
                    <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sm btn-warning"><i class="ti ti-pencil"></i></a>
                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger  " onclick="return confirm('Are you sure?')"><i class="ti ti-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection

@section('editstyles')
    <link href="{{ asset('assets/css/edit.css') }}" rel="stylesheet">
@endsection 