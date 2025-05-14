@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
<div class="container">
    <h1 class=" text-end mb-5">Edit Kategori</h1>

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
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control solid-input" id="nama" name="nama" value="{{ old('nama', $category->name) }}" required>
            </div>

            {{-- <div class="form-group mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control solid-input" id="slug" name="slug" value="{{ old('slug', $category->slug) }}" required>
            </div> --}}

            <div class="form-group mb-3">
                <label for="icon" class="form-label">Ikon (Opsional)</label>
                @if ($category->icon)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $category->icon) }}" alt="{{ $category->name }}" style="width: 50px; height: 50px;">
                    </div>
                @endif
                <input type="file" class="form-control-file" id="icon" name="icon">
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Update Kategori</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('editstyles')
    <link href="{{ asset('assets/css/edit.css') }}" rel="stylesheet">
@endsection