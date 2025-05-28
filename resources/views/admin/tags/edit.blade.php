@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Tag</h1>

    <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Tag </label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $tag->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection