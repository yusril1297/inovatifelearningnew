@extends('layouts.admin')

@section('content')
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="mb-4">{{ $course->title }}</h2>

        <div class="mt-4">
            <h4 class="mb-3">Daftar Video:</h4>
            @if ($videos->count() > 0)
                @foreach ($videos as $video)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $video->title }}</h5>
                            <div class="mb-3">
                                @if ($video->url)
                                    <!-- Video dari YouTube -->
                                    <iframe class="w-100" height="400"
                                        src="https://www.youtube.com/embed/{{ \Str::afterLast($video->url, 'v=') }}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                @elseif ($video->filename)
                                    <!-- Video yang diunggah -->
                                    <video class="w-100" height="400" controls>
                                        <source src="{{ asset('storage/videos/' . $video->filename) }}" type="video/mp4">
                                        Browser Anda tidak mendukung tag video.
                                    </video>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('courses.uploadVideoForm', $course->id) }}"
                                    class="btn btn-sm btn-primary">Upload Video</a>
                                <form action="{{ route('courses.deleteVideo', ['course' => $course->id, 'video' => $video->id]) }}"
                                    method="POST" onsubmit="return confirm('Anda yakin ingin menghapus video ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus Video</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info" role="alert">
                    Tidak ada video yang ditambahkan.
                </div>
                <a href="{{ route('courses.uploadVideoForm', $course->id) }}" class="btn btn-sm btn-primary">Upload Video</a>
            @endif

            {{-- PDF --}}
            <h4 class="mb-3">Daftar PDF:</h4>
            @if ($pdfs->count() > 0)
                @foreach ($pdfs as $pdf)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pdf->pdf }}</h5>
                            <div class="mb-3">
                                <embed src="{{ asset($pdf->pdf_url) }}" type="application/pdf" width="100%" height="400px" />
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('courses.uploadPdfForm', $course->id) }}"
                                    class="btn btn-sm btn-primary">Upload PDF</a>
                                <form action="{{ route('courses.deletePdf', ['course' => $course->id, 'pdf' => $pdf->id]) }}"
                                    method="POST" onsubmit="return confirm('Anda yakin ingin menghapus PDF ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus PDF</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info" role="alert">
                    Tidak ada PDF yang ditambahkan.
                </div>
                <a href="{{ route('courses.uploadPdfForm', $course->id) }}" class="btn btn-sm btn-primary">Upload PDF</a>
            @endif

{{-- Sertifikat --}}
<h4 class="mb-3">Daftar Sertifikat:</h4>
@if ($certificates->count() > 0)
    @foreach ($certificates as $certificate)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $certificate->name }}</h5>
                <div class="mb-3">
                    @if (Str::endsWith($certificate->file_url, ['.pdf']))
                        <embed src="{{ asset($certificate->file_url) }}" type="application/pdf" width="100%" height="400px" />
                    @else
                        <img src="{{ asset($certificate->file_url) }}" class="img-fluid" alt="Sertifikat">
                    @endif
                </div>
                <div class="d-flex justify-content-between">
                    @if (Auth::user()->role == 0 || Auth::user()->role == 1)
                        <a href="{{ route('courses.uploadCertificateForm', $course->id) }}" class="btn btn-sm btn-primary">
                            Upload Sertifikat
                        </a>
                    @endif
                    <form action="{{ route('courses.deleteCertificate', ['course' => $course->id, 'certificate' => $certificate->id]) }}"
                        method="POST" onsubmit="return confirm('Anda yakin ingin menghapus sertifikat ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus Sertifikat</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="alert alert-info" role="alert">
        Tidak ada sertifikat yang ditambahkan.
    </div>
    @if (Auth::user()->role == 0 || Auth::user()->role == 1)
        <a href="{{ route('courses.uploadCertificateForm', $course->id) }}" class="btn btn-sm btn-primary">Upload Sertifikat</a>
    @endif
@endif

@section('show')
    <link href="{{ asset('assets/css/show.css') }}" rel="stylesheet">
@endsection
