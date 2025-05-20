@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Upload PDF untuk {{ $course->title }}</h2>

        <form action="{{ route('instructor.courses.uploadPdf', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="fileInput" class="form-group mt-2">
                <label for="file">Unggah Pdf:</label>
                <input type="file" name="pdf" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-2">Tambahkan </button>
        </form>
    </div>
@endsection
