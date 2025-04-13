@extends('layouts.front')

@section('content')
    {{-- Detail Content --}}
    <div class="text-black font-poppins pt-10 pb-[50px]">
        <section id="video-content" class="max-w-[1100px] w-full mx-auto mt-[130px]">
            <div class="video-player relative flex flex-nowrap gap-5">
                <div class="plyr__video-embed w-full overflow-hidden relative rounded-[20px]" id="player">
                    <iframe src="{{ $courses->youtube_thumbnail_url }}" allowfullscreen allowtransparency
                        allow="autoplay"></iframe>
                </div>
                <div
                    class="video-player-sidebar flex flex-col shrink-0 w-[330px] h-[470px] bg-[#F5F8FA] rounded-[20px] p-5 gap-5 pb-0 overflow-y-scroll no-scrollbar">
                    <p class="font-bold text-lg text-black">{{ $courses->videos->count() }} Video</p>
                   
                    <div class="flex flex-col gap-3">
                        <div
                            class="group p-[12px_16px] flex items-center gap-[10px] bg-[#3525B3] rounded-full hover:bg-[#3525B3] transition-all duration-300">
                            <div class="text-white group-hover:text-white transition-all duration-300">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.97 2C6.44997 2 1.96997 6.48 1.96997 12C1.96997 17.52 6.44997 22 11.97 22C17.49 22 21.97 17.52 21.97 12C21.97 6.48 17.5 2 11.97 2ZM14.97 14.23L12.07 15.9C11.71 16.11 11.31 16.21 10.92 16.21C10.52 16.21 10.13 16.11 9.76997 15.9C9.04997 15.48 8.61997 14.74 8.61997 13.9V10.55C8.61997 9.72 9.04997 8.97 9.76997 8.55C10.49 8.13 11.35 8.13 12.08 8.55L14.98 10.22C15.7 10.64 16.13 11.38 16.13 12.22C16.13 13.06 15.7 13.81 14.97 14.23Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                           
                            .
                        </div>
                        @forelse ($courses->videos as $video)
                            <div
                                class="group p-[12px_16px] flex items-center gap-[10px] bg-[#3525B3]  rounded-full hover:bg-[#3525B3] transition-all duration-300">
                                <div class="text-white group-hover:text-white transition-all duration-300">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.97 2C6.44997 2 1.96997 6.48 1.96997 12C1.96997 17.52 6.44997 22 11.97 22C17.49 22 21.97 17.52 21.97 12C21.97 6.48 17.5 2 11.97 2ZM14.97 14.23L12.07 15.9C11.71 16.11 11.31 16.21 10.92 16.21C10.52 16.21 10.13 16.11 9.76997 15.9C9.04997 15.48 8.61997 14.74 8.61997 13.9V10.55C8.61997 9.72 9.04997 8.97 9.76997 8.55C10.49 8.13 11.35 8.13 12.08 8.55L14.98 10.22C15.7 10.64 16.13 11.38 16.13 12.22C16.13 13.06 15.7 13.81 14.97 14.23Z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <a
                                    href="{{ route('frontend.learning', ['course' => $courses->slug, 'video' => $video->id]) }}">
                                    <p class="font-semibold group-hover:text-white transition-all duration-300 text-white">
                                        {{ $video->title }}</p>
                                </a>
                            </div>
                        @empty
                        @endforelse
                        <p class="font-bold text-lg text-black">{{ $courses->pdfs->count() }} File</p>
                        @forelse ($courses->pdfs as $pdf)
                            <div
                                class="group p-[12px_16px] flex items-center gap-[10px] bg-[#3525B3]  rounded-full hover:bg-[#3525B3] transition-all duration-300">
                                <div class="text-white group-hover:text-white transition-all duration-300">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.97 2C6.44997 2 1.96997 6.48 1.96997 12C1.96997 17.52 6.44997 22 11.97 22C17.49 22 21.97 17.52 21.97 12C21.97 6.48 17.5 2 11.97 2ZM14.97 14.23L12.07 15.9C11.71 16.11 11.31 16.21 10.92 16.21C10.52 16.21 10.13 16.11 9.76997 15.9C9.04997 15.48 8.61997 14.74 8.61997 13.9V10.55C8.61997 9.72 9.04997 8.97 9.76997 8.55C10.49 8.13 11.35 8.13 12.08 8.55L14.98 10.22C15.7 10.64 16.13 11.38 16.13 12.22C16.13 13.06 15.7 13.81 14.97 14.23Z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <a
                                    href="{{ route('frontend.download', ['course' => $courses->slug, 'pdf' => $pdf->id]) }}">
                                    <p class="font-semibold group-hover:text-white transition-all duration-300 text-white">
                                        {{ $pdf->title }}</p>
                                </a>
                            </div>
                        @empty
                        @endforelse

                    </div>
                </div>
            </div>
        </section>
        <section id="Video-Resources" class="flex flex-col mt-5">
            <div class="max-w-[1100px] w-full mx-auto flex flex-col gap-3">
                <h1 class="title font-extrabold text-[30px] leading-[45px]">{{ $courses->title }}</h1>
                <div class="flex items-center gap-5">
                    <div class="flex items-center gap-[6px]">
                        
                        {{ $courses->category->name }}
                    </div>
                    @if(Auth::check())
                    <a href="{{ route('certificate.generate', $courses->id) }} class="flex items-center gap-[6px]">
                        <p class="font-semibold">Certificate</p>
                    </a>
                    @endif
                    <div class="flex items-center gap-[6px]">
                        <div>
                            <img src="{{ asset('assets/icon/profile-2user.svg') }}" alt="icon">
                        </div>
                        <p class="font-semibold">{{ $courses->enrollments->count() }}</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <p class="font-semibold">About</p>
                    </div>

                </div>
            </div>
            <div class="max-w-[1100px] w-full mx-auto flex mt-5">

                {{-- <a href="{{ $enrollment
                    ? route('frontend.learning', ['course' => $courses->slug, 'video' => $courses->videos->first()->id])
                    : route('frontend.checkout', ['course' => $courses->slug]) }}"
                    class="flex py-2.5 px-3 text-sm font-semibold leading-6 rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                    {{ $enrollment ? 'Go to Class' : 'Buy Class' }}
                </a> --}}
                @if ($enrollment?->status === 'active')
                    <a href="{{ route('frontend.learning', ['course' => $courses->slug, 'video' => $courses->videos->first()->id]) }}"
                        class="btn btn-primary">Go to Class</a>
                @else
                    <a class="flex py-2.5 px-3 text-sm font-semibold leading-6 rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700"
                        href="{{ route('frontend.checkout', ['course' => $courses->slug]) }}">Buy
                        Class</a>
                @endif

        
            </div>
                </div>
            </div>
        </section>
    </div>
    {{-- End Detail Content --}}

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
