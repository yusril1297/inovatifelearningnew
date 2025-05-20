@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Upload Sertifikat untuk {{ $course->title }}</h2>

    {{-- Notifikasi sukses atau error --}}
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

    {{-- Form Upload Sertifikat --}}
    <div class="card shadow-sm p-4">
        <form action="{{ route('courses.uploadCertificate', $course->id) }}" 
            method="POST" enctype="multipart/form-data">        
            @csrf
            <div class="form-group">
                <label for="certificate"><strong>Unggah Sertifikat</strong> (PDF, PNG, JPG, JPEG):</label>
                <input type="file" name="certificate" class="form-control @error('certificate') is-invalid @enderror" accept=".pdf,.png,.jpg,.jpeg" required>
                @error('certificate')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-2">Unggah Sertifikat</button>
        </form>
    </div>

    {{-- Menampilkan sertifikat jika sudah ada --}}
    @if(isset($certificate) && $certificate && isset($certificate->certificate_url))
        <div class="card mt-4 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Sertifikat Saat Ini:</h4>

                @php
                    $fileExtension = pathinfo($certificate->certificate_url, PATHINFO_EXTENSION);
                    $filePath = asset($certificate->certificate_url);
                @endphp

                @if($fileExtension === 'pdf')
                    <embed src="{{ $filePath }}" type="application/pdf" width="100%" height="400px" class="border rounded" />
                @else
                    <img src="{{ $filePath }}" class="img-fluid rounded shadow-sm" alt="Sertifikat">
                @endif

                <p class="mt-3">
                    <a href="{{ $filePath }}" target="_blank" class="btn btn-success">
                        <i class="fas fa-eye"></i> Lihat Sertifikat
                    </a>

                    {{-- Form untuk menghapus sertifikat --}}
                    @if (Auth::check() && (Auth::user()->role == 0 || Auth::user()->role == 1))
                        <form action="{{ route('courses.deleteCertificate', $course->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus sertifikat ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Hapus Sertifikat
                            </button>
                        </form>
                    @endif
                </p>
            </div>
        </div>
    @else
        <div class="alert alert-info mt-4">
            <i class="fas fa-info-circle"></i> Belum ada sertifikat yang diunggah.
        </div>
    @endif
</div>
@endsection
