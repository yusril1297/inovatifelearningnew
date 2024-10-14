{{-- @extends('layouts.frontend')

@section('content')
    <div class="container mx-auto mt-5">
        <h1 class="text-3xl font-bold">Categories</h1>

        <!-- Cek apakah ada kategori -->
        @if($categories->isEmpty())
            <p>No categories available.</p>
        @else
            <!-- Loop melalui setiap kategori -->
            @foreach($categories as $category)
                <div class="mt-8">
                    <h2 class="text-2xl font-semibold">{{ $category->name }}</h2>
                    <h3 class="text-xl mt-2">Courses in this category:</h3>

                    <!-- Cek apakah collection courses kosong -->
                    @if($category->courses->isEmpty())
                        <p>No courses available in this category.</p>
                    @else
                        <div class="grid grid-cols-3 gap-4 mt-4">
                            @foreach($category->courses as $course)
                                <div class="bg-white shadow-lg p-4 rounded-lg">
                                    <h4 class="text-xl font-semibold">{{ $course->title }}</h4>
                                    <p class="text-gray-600">{{ $course->description }}</p>
                                    <p class="text-sm text-gray-500">
                                        {{ $course->enrollments->count() }} students enrolled
                                    </p>
                                    <a href="{{ route('frontend.course.show', $course->id) }}" class="text-blue-500">View Course</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
@endsection --}}
