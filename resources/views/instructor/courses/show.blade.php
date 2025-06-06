@extends('layouts.admin')

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

     <div class="mt-4">
            <h4 class="mb-3">Daftar Test</h4>
           @forelse ($tests as $test )
               <div class="d-flex justify-content-between">
                <p>{{ $test->name }}</p>
          <a href={{ route("courses.createQuestion", ['test'=>$test->id]) }} class="btn btn-primary" ">
                Tambahkan Pertanyan</a>
               </div>
           @empty
                <div class="alert alert-info">Tidak ada test yang ditambahkan.</div>
           @endforelse
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">Buat
                Test</button>
            <!-- Modal -->
<div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-labelledby="exampleLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleLargeModalLabel">Buat Test</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body with Form -->
            <form action="{{ route('courses.storeTest') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Judul Test</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukkan judul test" required>
                    </div>
                </div>
                <input type="text" class="d-none" name="course_id" value="{{ optional($course)->id }}">

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

        </div>

    </div>
@endsection

@section('show')
    <link href="{{ asset('assets/css/show.css') }}" rel="stylesheet">
@endsection
