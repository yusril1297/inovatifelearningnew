@extends('layouts.admin')

@section('title', 'Buat Kategori')

@section('content')
<div class="container">
    <!-- Mengatur heading ke sebelah kanan dan membuatnya lebih tebal -->
    <h1 class="mb-5 text-end fw-bold">Buat Kategori Baru</h1>

    <!-- Menampilkan pesan error -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk membuat kategori baru dengan style yang lebih menarik -->
    <div class="card">
    <div class="card p-4 shadow-sm">
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control solid-input" value="{{ old('nama') }}" required>
            </div>
{{-- 
            <div class="form-group mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control solid-input" value="{{ old('slug') }}" required>
            </div> --}}

            <div class="form-group mb-3">
                <label for="icon" class="form-label">Ikon</label>
                <input type="file" name="icon" id="icon" class="form-control-file" required>
            </div>

            <!-- Tambahkan kelas 'mt-3' untuk memberikan jarak ke bawah -->
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Kategori</button>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection

<!-- Link ke file CSS -->
@section('styles')
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
@endsection