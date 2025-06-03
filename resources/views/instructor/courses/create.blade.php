@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Buat Kursus Baru</h1>

    <form action="{{ route('instructor.courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Judul Kursus</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

         <div class="form-group">
                <label for="description">Deskripsi</label>
                <input id="description" type="hidden" name="description" value="{{ old('description') }}">
  <trix-editor input="description"></trix-editor>
            </div>

        <div class="form-group">
            <label for="category_id">Kategori</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="level_id">Level</label>
            <select name="level_id" id="level_id" class="form-control" required>
                <option value="">Pilih Level</option>
                @foreach($levels as $level)
                    <option value="{{ $level->id }}" {{ old('level_id') == $level->id ? 'selected' : '' }}>
                        {{ $level->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            <select name="tags[]" id="tags" class="form-control select2" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ (collect(old('tags'))->contains($tag->id)) ? 'selected' : '' }}>
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
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subscription">Type Subcription</label>
            <select name="subscription_periods" id="subcription_periods" class="form-control" required>
                <option value="week">Minggu</option>
                <option value="month">Bulan</option>
                <option value="year">Tahun</option>
                <option value="lifetime">Selamanya</option>
            </select>
        </div>
        <div class="form-group">
            <label for="subscription_duration">Durasi Subscription</label>
            <input type="number" name="subscription_duration" id="subscription_duration" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('instructor.courses.index') }}" class="btn btn-secondary me-2">Back</a>
            <button type="submit" class="btn btn-primary">Save Course</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const periodSelect = document.getElementById("subcription_periods");
        const durationInput = document.getElementById("subscription_duration");

        console.log(periodSelect.value);

        function toggleDurationInput() {
            if (periodSelect.value === "lifetime") {
                durationInput.disabled = true;
                durationInput.value = ""; // Kosongkan input jika dinonaktifkan
            } else {
                durationInput.disabled = false;
            }
        }

        // Panggil fungsi saat pertama kali dimuat
        toggleDurationInput();

        // Tambahkan event listener untuk perubahan
        periodSelect.addEventListener("change", toggleDurationInput);
    });
</script>

@endsection



