@extends('layouts.instructor')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="mb-4">{{ optional($course)->title ?? 'Nama Course Tidak Ditemukan' }}</h2>

        {{-- Daftar Video --}}
        <div class="mt-4">
            <h4 class="mb-3">Daftar Video:</h4>
            @if (!empty($videos) && $videos->count() > 0)
                @foreach ($videos as $video)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $video->title ?? 'Video Tanpa Judul' }}</h5>
                            <div class="mb-3">
                                @if (!empty($video->url))
                                    <iframe class="w-100" height="400"
                                        src="https://www.youtube.com/embed/{{ \Str::afterLast($video->url, 'v=') }}"
                                        frameborder="0" allowfullscreen></iframe>
                                @elseif (!empty($video->filename))
                                    <video class="w-100" height="400" controls>
                                        <source src="{{ asset('storage/videos/' . $video->filename) }}" type="video/mp4">
                                    </video>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('courses.uploadVideoForm', ['course' => optional($course)->id]) }}" class="btn btn-sm btn-primary">Upload Video</a>
                                <form action="{{ route('courses.deleteVideo', ['course' => optional($course)->id, 'video' => $video->id]) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus video ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus Video</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info">Tidak ada video yang ditambahkan.</div>
                <a href="{{ route('courses.uploadVideoForm', ['course' => optional($course)->id]) }}" class="btn btn-sm btn-primary">Upload Video</a>
            @endif
        </div>

        {{-- Daftar PDF --}}
        <div class="mt-4">
            <h4 class="mb-3">Daftar PDF:</h4>
            @if (!empty($pdfs) && $pdfs->count() > 0)
                @foreach ($pdfs as $pdf)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pdf->pdf ?? 'Dokumen PDF' }}</h5>
                            <embed src="{{ asset(optional($pdf)->pdf_url) }}" type="application/pdf" width="100%" height="400px" />
                            <div class="d-flex justify-content-between mt-2">
                                <a href="{{ route('courses.uploadPdfForm', ['course' => optional($course)->id]) }}" class="btn btn-sm btn-primary">Upload PDF</a>
                                <form action="{{ route('courses.deletePdf', ['course' => optional($course)->id, 'pdf' => $pdf->id]) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus PDF ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus PDF</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info">Tidak ada PDF yang ditambahkan.</div>
                <a href="{{ route('courses.uploadPdfForm', ['course' => optional($course)->id]) }}" class="btn btn-sm btn-primary">Upload PDF</a>
            @endif
        </div>

     
{{-- Daftar Sertifikat --}}
<div class="mt-4">
    <h4 class="mb-3">Daftar Sertifikat:</h4>
    @if ($certificates->isNotEmpty())
        @foreach ($certificates as $certificate)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $certificate->certificate_code ?? 'Sertifikat' }}</h5>
                    <div class="mb-3">
                        @if (Str::endsWith($certificate->certificate_url, ['.pdf']))
                            <embed src="{{ asset($certificate->certificate_url) }}" type="application/pdf" width="100%" height="400px" />
                        @else
                            <img src="{{ asset($certificate->certificate_url) }}" class="img-fluid" alt="Sertifikat">
                        @endif
                    </div>
                    <div class="d-flex justify-content-between">
                        @if (Auth::check() && (Auth::user()->role == 0 || Auth::user()->role == 1))
                            <form action="{{ route('courses.deleteCertificate', ['course' => $course->id, 'certificate' => $certificate->id]) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus sertifikat ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus Sertifikat</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info">Tidak ada sertifikat yang ditambahkan.</div>
        @if (Auth::check() && (Auth::user()->role == 0 || Auth::user()->role == 1))
            <a href="{{ route('courses.uploadCertificateForm', ['course' => $course->id]) }}" class="btn btn-sm btn-primary">Upload Sertifikat</a>
        @endif
    @endif
</div>

    </div>
@endsection

@section('show')
    <link href="{{ asset('assets/css/show.css') }}" rel="stylesheet">
@endsection
