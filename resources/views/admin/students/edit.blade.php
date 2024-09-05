@extends('admin.dashboard')

@section('title', 'Edit Student')

@section('content')
<div class="container">
    <h1 class=" text-end mb-5">Edit Student</h1>

    <!-- Menampilkan pesan error jika validasi gagal -->
    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-4 shadow-sm">
       <!-- Form untuk mengedit instruktur -->
    <form action="{{ route('admin.students.update', $students->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $students->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $students->email) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Back</a>
    </form>
    </div>
</div>
@endsection

@section('editstyles')
    <link href="{{ asset('assets/css/edit.css') }}" rel="stylesheet">
@endsection