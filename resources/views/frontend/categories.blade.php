@extends ('layouts.front')

@section ('content')

<section id="Top-Categories" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[100px] gap-[30px]">

   
    
    <div class="flex flex-col gap-[30px]">
       
        <div
            class="bg-gradient-to-r from-sky-100 to-blue-200 w-fit p-[8px_16px] rounded-full border border-[#adc7fe] flex items-center gap-[6px]">
            <div>
                <img src="{{ asset('assets/icon/medal-star.svg') }}" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#1E90FF]">Top Categories</p>
        </div>

        <div class="flex flex-col">
            <h2 class="font-bold text-[40px] leading-[60px]">{{ $categories->name }}</h2>
            <p class="text-[#6D7786] text-lg -tracking-[2%]">{{ $categories->description }}</p>
        </div>

        

        <!-- Class -->
        <div class="grid grid-cols-3 gap-[30px] w-full">
            {{-- Looping Courses --}}
            @forelse($categories->courses as $course)
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
                                    @for($i = 0; $i < 5; $i++)
                                        <div>
                                            <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                        </div>
                                    @endfor
                                </div>
                                <p class="text-right text-[#6D7786]">{{ $course->students_count }} students</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('storage/' . $course->instructor->avatar) }}" class="w-full h-full object-cover" alt="icon">
                            </div>
                            <div class="flex flex-col">
                                <p class="font-semibold">{{ $course->instructor->name }}</p>
                                <p class="text-[#6D7786]">{{ $course->instructor->title }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <p>No courses available in this category.</p>
            @endforelse
        </div>
        <!-- End Class -->

        
    </div>
  
</section>


<script src="{{ asset('js/main.js') }}"></script>
@endSection