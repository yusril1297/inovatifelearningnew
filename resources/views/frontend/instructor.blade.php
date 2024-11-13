@extends('layouts.front')

@section('content')
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Title -->
    <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-neutral-700">Our instructor</h2>
        <p class="mt-1 text-gray-600 dark:text-neutral-500">Creative people</p>
    </div>
    <!-- End Title -->

    <!-- Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
        @foreach ($instructors as $instructor)
        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-4">
            <img class="rounded-lg size-20"
            src="{{ $instructor->profile_picture_url }}"
                alt="Avatar">

            <div class="grow">
                
                <div>
                    <h3 class="font-medium text-gray-800 dark:text-neutral-600"> {{ $instructor->name}}</h3>
                    <p class="mt-1 text-xs uppercase text-gray-500 dark:text-neutral-500">
                        Founder / CEO
                    </p>
                </div>

                <!-- Social Brands -->
                <div class="mt-2 sm:mt-auto space-x-2.5">
                    <a class="inline-flex justify-center items-center text-gray-500 rounded-full hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                        href="#">
                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                        </svg>
                    </a>
                </div>
                
                <!-- End Social Brands -->
            </div>
        </div>
        @endforeach
        <!-- End Col -->

       

      
    </div>
    <!-- End Grid -->
</div>

@endsection