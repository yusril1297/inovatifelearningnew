@extends('layouts.front')

@section('content')

<div class="bg-white"> 
    <div>
        <!--
                    Mobile filter dialog
              
                    Off-canvas filters for mobile, show/hide based on off-canvas filters state.
                  -->


        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900">My Course</h1>


            </div>

            <section aria-labelledby="products-heading" class="pb-24 pt-6">
                <h2 id="products-heading" class="sr-only">Products</h2>

                <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                    <!-- Filters -->
                    <form class="hidden lg:block">
                        <h3 class="sr-only">Categories</h3>
                        <ul role="list"
                            class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
                            <li>
                                <div class="text-center">
                                    <img class="rounded-full size-24 mx-auto"
                                        src="{{ Auth::user()->profile_picture_url }}"
                                        alt="Avatar">
                                    <div class="mt-2 sm:mt-4">
                                        <h3 class="font-medium text-gray-900">
                                            {{ Auth::user()->name }}
                                        </h3>
                                        <p class="text-sm text-gray-500">
                                            Student
                                        </p>
                                    </div>
                            </li>
                        </ul>
                    </form>
                    <!-- Product grid -->
                    @foreach ($courses as $course)
                    <div class="course-card">
                        <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden ring-1 ring-[#DADEE4] transition-all duration-300 hover:ring-2 hover:ring-[#adc7fe]">
                            <a href="{{ route('frontend.details', $course->slug) }}" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                                @if($course->youtube_thumbnail_url)
                                <iframe width="100%" height="100%" src="{{ $course->youtube_thumbnail_url }}?autoplay=0&mute=1" 
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen></iframe>
                            @endif
                        </a>
                            <div class="flex flex-col px-4 gap-[32px]">
                                <div class="flex flex-col gap-[10px]">
                                    <a href="{{ route('frontend.details', $course->slug) }}" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">{{ $course->title }}</a>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center gap-[2px]">
                                            @for($i = 0; $i < 5; $i++)
                                            <div>
                                                <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                            </div>
                                            @endfor
                                        </div>
                                        <p class="text-right text-[#6D7786]">{{ $course->enrollments->count() }} students</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                        <img src="{{ $course->instructor->profile_picture_url }}" class="w-full h-full object-cover" alt="instructor-avatar">
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
                </div>
            </section>
        </main>
    </div>
</div>

@endsection