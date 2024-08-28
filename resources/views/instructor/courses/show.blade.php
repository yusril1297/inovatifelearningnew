@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>{{ $course->title }}</h2>

    <div class="mt-4">
        
        <h4>Daftar Video:</h4>
        @if ($videos->count() > 0)
            @foreach ($videos as $video)
                <div class="mb-3 d-flex justify-content-between align-items-center ">
                    @if ($video->url)
                        <!-- Video dari URL YouTube -->
                        <iframe width="75%" height="400" src="https://www.youtube.com/embed/{{ \Str::afterLast($video->url, 'v=') }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @elseif ($video->filename)
                        <!-- Video yang diunggah langsung -->
                        <video width="75%" controls>
                            <source src="{{ asset('storage/videos/' . $video->filename) }}" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                    @endif
                    

                    <a href="{{ route('courses.uploadVideoForm', $course->id) }}" class="btn btn-sm btn-primary">Upload Video</a>
                    <form action="{{ route('instructor.courses.deleteVideo', ['course' => $course->id, 'video' => $video->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-2">Hapus Video</button>
                    </form>
                </div>
            @endforeach
        @else
            <p>Tidak ada video yang ditambahkan.</p>
            <a href="{{ route('courses.uploadVideoForm', $course->id) }}" class="btn btn-sm btn-primary">Upload Video</a>
        @endif
    </div>
</div>
@endsection