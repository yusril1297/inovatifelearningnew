@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Kursus: {{ $course->title }}</h1>

    <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
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
                @foreach($levels as $level)
                <option value="{{ $level->id }}" {{ $level->id == $course->level_id ? 'selected' : '' }}>
                    {{ $level->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            <select name="tags[]" id="tags" class="form-control select2" multiple="multiple">
                @foreach($tags as $tag)
                <option value="{{ $tag->id }}" 
                    @if($course->tags->contains($tag->id)) selected @endif>
                    {{ $tag->name }}
                </option>
                @endforeach
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

        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary me-2">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection