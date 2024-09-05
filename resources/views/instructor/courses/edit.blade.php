@extends('layouts.instructor')

@section('content')
<div class="container">
    <h1>Edit Kursus: {{ $course->title }}</h1>

    <form action="{{ route('instructor.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Judul Kursus</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $course->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="summernote" class="form-control" required>{{ $course->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="category_id">Kategori</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $course->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="level_id">Level</label>
            <select name="level_id" id="level_id" class="form-control" required>
                <option value="">Pilih Level</option>
                @foreach($levels as $level)
                    <option value="{{ $level->id }}" {{ (old('level_id', $course->level_id) == $level->id) ? 'selected' : '' }}>
                        {{ $level->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            <select name="tags[]" id="tags" class="form-control select2" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $selectedTags)) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="draft" {{ old('status', $course->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $course->status) == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>
    

        <div class="form-group">
            <label for="youtube_thumbnail_url">YouTube Thumbnail URL</label>
            <input type="url" name="youtube_thumbnail_url" id="youtube_thumbnail_url" class="form-control" value="{{ old('youtube_thumbnail_url', $course->youtube_thumbnail_url ?? '') }}">
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $course->price }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="published" {{ $course->status == 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ $course->status == 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

@section('scripts')
<!-- Jika menggunakan plugin select2 untuk multiple select -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tags').select2({
            placeholder: "Pilih Tags",
            allowClear: true
        });
    });
</script>
@endsection
