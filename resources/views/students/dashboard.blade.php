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
                                        src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                        alt="Avatar">
                                    <div class="mt-2 sm:mt-4">
                                        <h3 class="font-medium text-gray-900">
                                            David Forren
                                        </h3>
                                        <p class="text-sm text-gray-500">
                                            Student
                                        </p>
                                    </div>
                            </li>
                        </ul>
                    </form>
                    <!-- Product grid -->
                    <div class="course-card">
                        <div
                            class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden ring-1 ring-[#DADEE4] transition-all duration-300 hover:ring-2 hover:ring-[#adc7fe]">
                            <a href="" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                                <img src="{{ asset('assets/thumbnail/image.png') }}" class="w-full h-full object-cover"
                                    alt="thumbnail">
                            </a>
                            <div class="flex flex-col px-4 gap-[32px]">
                                <div class="flex flex-col gap-[10px]">
                                    <a href=""
                                        class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">Modern
                                        JavaScript: Bikin Projek Website Seperti Twitter</a>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center gap-[2px]">
                                            <div>
                                                <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                            </div>
                                            <div>
                                                <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                            </div>
                                            <div>
                                                <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                            </div>
                                            <div>
                                                <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                            </div>
                                            <div>
                                                <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                            </div>
                                        </div>
                                        <p class="text-right text-[#6D7786]">41 students</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/photo/photo1.png') }}" class="w-full h-full object-cover"
                                            alt="icon">
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="font-semibold">Angga Risky</p>
                                        <p class="text-[#6D7786]">Full-Stack Developer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="course-card">
                        <div
                            class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden ring-1 ring-[#DADEE4] transition-all duration-300 hover:ring-2 hover:ring-[#adc7fe]">
                            <a href="" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                                <img src="{{ asset('assets/thumbnail/image.png') }}" class="w-full h-full object-cover"
                                    alt="thumbnail">
                            </a>
                            <div class="flex flex-col px-4 gap-[32px]">
                                <div class="flex flex-col gap-[10px]">
                                    <a href=""
                                        class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">Modern
                                        JavaScript: Bikin Projek Website Seperti Twitter</a>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center gap-[2px]">
                                            <div>
                                                <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                            </div>
                                            <div>
                                                <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                            </div>
                                            <div>
                                                <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                            </div>
                                            <div>
                                                <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                            </div>
                                            <div>
                                                <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                            </div>
                                        </div>
                                        <p class="text-right text-[#6D7786]">41 students</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                        <img src="{{ asset('assets/photo/photo1.png') }}" class="w-full h-full object-cover"
                                            alt="icon">
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="font-semibold">Angga Risky</p>
                                        <p class="text-[#6D7786]">Full-Stack Developer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

@endsection