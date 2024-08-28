@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Upload Video untuk {{ $course->title }}</h2>
    
    <form action="{{ route('admin.courses.uploadVideo', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Video Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="videoType">Sumber Video:</label>
            <select id="videoType" name="videoType" class="form-control" onchange="toggleVideoInput(this.value)">
                <option value="url">URL YouTube</option>
                <option value="upload">Unggah Video</option>
            </select>
        </div>

        <div id="urlInput" class="form-group mt-2">
            <label for="url">URL YouTube:</label>
            <input type="url" name="url" class="form-control" placeholder="https://www.youtube.com/watch?v=example">
        </div>

        <div id="fileInput" class="form-group mt-2" style="display: none;">
            <label for="video">Unggah Video:</label>
            <input type="file" name="video" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-2">Tambahkan Video</button>
    </form>
</div>

<script>
function toggleVideoInput(value) {
    if (value === 'url') {
        document.getElementById('urlInput').style.display = 'block';
        document.getElementById('fileInput').style.display = 'none';
    } else {
        document.getElementById('urlInput').style.display = 'none';
        document.getElementById('fileInput').style.display = 'block';
    }
}
</script>
@endsection