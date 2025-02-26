@extends('layouts.instructor')

@section('content')
    <div class="container">
        <h2>Upload Sertifikat untuk {{ $course->title }}</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('instructor.courses.uploadCertificate', ['course' => $course->id]) }}" 
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-2">
                <label for="certificate">Unggah Sertifikat (PDF, PNG, JPG, JPEG):</label>
                <input type="file" name="certificate" class="form-control" accept=".pdf,.png,.jpg,.jpeg" required>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Unggah Sertifikat</button>
        </form>

        @if($course->certificate_url)
            <div class="mt-4">
                <h4>Sertifikat Saat Ini:</h4>
                <p>
                    <a href="{{ asset($course->certificate_url) }}" target="_blank" class="btn btn-success">
                        Lihat Sertifikat
                    </a>
                </p>
            </div>
        @endif
    </div>
@endsection
