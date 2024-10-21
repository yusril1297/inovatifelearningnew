@extends('layouts.front')

@section ('content')

<div class="font-[sans-serif] bg-gray-100">
    <div class="p-4 mx-auto lg:max-w-7xl sm:max-w-full">
        <h2 class="flex items-center justify-center text-4xl font-extrabold mb-6 text-gray-800 dark:text-neutral-500">All
            Course</h2>
        <h3 class="flex items-center justify-center">Gain knowledge from experienced mentors with a budget-friendly cost.
        </h3>

        <!-- Product -->
        <section id="Top-Categories" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[10px] gap-[30px]">
            
    
                <!-- Class -->
                <div class="grid grid-cols-4 gap-[30px] w-full">
                    {{-- Course Card --}}
                    @foreach ($courses as $course)
                    <div class="course-card">
                        
                        <div
                            class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden ring-1 ring-[#DADEE4] transition-all duration-300 hover:ring-2 hover:ring-[#adc7fe]">
                            <a href="{{ route('frontend.details', $course->slug) }}" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                                @if($course->youtube_thumbnail_url)
                                    <iframe width="100%" height="100%" src="{{ $course->youtube_thumbnail_url }}?autoplay=0&mute=1" 
                                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen></iframe>
                                @endif
                            </a>
                            <div class="flex flex-col px-4 gap-[32px]">
                                <div class="flex flex-col gap-[10px]">
                                    <a href="{{ route('frontend.details', $course->slug) }}"
                                        class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">{{ $course->title }}</a>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center gap-[2px]">
                                            <!-- Bintang Rating (Contoh, bisa disesuaikan) -->
                                            @for($i = 0; $i < 5; $i++)
                                            <div>
                                                <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                            </div>
                                            @endfor
                                        </div>
                                        <p class="text-right text-[#6D7786]">{{ $course->enrollments->count() }} students</p>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <p class="font-bold text-lg text-[#1F2937]">Rp {{ number_format($course->price, 0, ',', '.') }}</p> <!-- Harga -->
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/photo/photo1.png') }}" class="w-full h-full object-cover"
                                            alt="icon">
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="font-semibold">{{ $course->instructor->name }}</p>
                                        <p class="text-[#6D7786]">{{ $course->category->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                   
                    @endforeach
                    {{-- Course Card --}}
                </div>
                <!-- End Class -->
                  
        </section>

    </div>
</div>
<!-- End Product -->
<script src="{{ asset('assets/js/main.js') }}"></script>

@endsection