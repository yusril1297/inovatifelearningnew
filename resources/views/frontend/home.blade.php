@extends('layouts.front')

@section('content')
  <!-- Hero -->
<!-- Hero -->
<div class="overflow-hidden">
    <div class="max-w-[70rem] mx-auto px-4 sm:px-6 lg:px-8 py-28">
      <div class="flex flex-col lg:flex-row items-center lg:items-start justify-between gap-12">
        <!-- Text Content -->
        <div class="lg:ml-12">
          <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-800 dark:text-neutral-600 leading-tight mb-6">
            Belajar Bersama Mentor Berpengalaman
          </h1>
          <p class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-800 dark:text-neutral-600 mb-8">
            Sudah dimanfaatkan oleh 400+ member di seluruh dunia.
          </p>
          <div class="flex items-center gap-4">
            <a href="{{ route('frontend.allCourses') }}"
              class="bg-blue-600 text-white py-3 px-6 lg:py-4 lg:px-8 text-lg lg:text-xl rounded-full flex items-center gap-2 shadow-lg hover:bg-blue-700 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
              </svg>
              Belajar Sekarang
            </a>
          </div>
        </div>
  
        <!-- Image -->
        <div class="justify-center lg:justify-end">
          <img src="assets/icon/foto5.png"
            alt="Gambar Belajar" class="max-w-full h-auto rounded-lg">
        </div>
      </div>
  
      <!-- Avatar Group -->
      
    </div>
  </div>
  <!-- End Hero -->
  

    <!--
          This example requires some changes to your config:
          
          ```
          // tailwind.config.js
          module.exports = {
            // ...
            plugins: [
              // ...
              require('@tailwindcss/aspect-ratio'),
            ],
          }
          ```
        -->
        {{--  --}}
 <div class="container mx-auto py-20">
    <h2 class="text-2xl font-bold text-center mb-8">Keunggulan Kami</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6"> 
   <!-- Card 1 -->
    <div class="border rounded-lg shadow-md p-6">
        <div class="flex flex-col items-center mb-4"> <!-- Mengubah flex menjadi kolom -->
            <img src="https://img.freepik.com/free-vector/check-mark-with-review-stars_78370-1123.jpg?t=st=1739341583~exp=1739345183~hmac=3679dd1586a6e5a69a73194291de46a31fa1d8b1212ada7d25505dda2290793e&w=1380" alt="Rating Icon" class="w-30 h-40 mb-3">
            <h3 class="text-3xl font-semibold text-center mt-4">Rating</h3>
        </div>
        <p class="text-gray-600 text-xl text-center pt-6"> <!-- Menambahkan ukuran teks xl pada deskripsi -->
            Membantu siswa memilih kursus berkualitas, memberikan umpan balik cepat untuk perbaikan, menyesuaikan materi dengan preferensi pengguna, menjaga kualitas pengajaran, dan membangun komunitas belajar yang terhubung
        </p>
    </div>

    <!-- Card 2 -->
    <div class="border rounded-lg shadow-md p-6">
        <div class="flex flex-col items-center mb-4"> <!-- Mengubah flex menjadi kolom -->
            <img src="https://cdn-icons-png.flaticon.com/128/1165/1165771.png" alt="Rating Icon" class="w-30 h-40 mb-3">
            <h3 class="text-3xl font-semibold text-center mt-4">Kepuasan</h3>
        </div>
        <p class="text-gray-600 text-xl text-center pt-6"> <!-- Menambahkan ukuran teks xl pada deskripsi -->
        Kami juga menjaga kualitas pengajaran dengan menghadirkan pengajaran yang profesional dan berbobot, serta membangun komunitas belajar yang terhubung, di mana siswa dapat saling mendukung dan berkembang bersama.
        </p>
    </div>
    
    <!-- Card 3 -->

    <div class="border rounded-lg shadow-md p-6">
        <div class="flex flex-col items-center mb-4"> <!-- Mengubah flex menjadi kolom -->
            <img src="https://cdn-icons-png.flaticon.com/128/3135/3135727.png" alt="Rating Icon" class="w-30 h-40 mb-3">
            <h3 class="text-3xl font-semibold text-center mt-4">Finance</h3>
        </div>
        <p class="text-gray-600 text-xl text-center pt-6"> <!-- Menambahkan ukuran teks xl pada deskripsi -->
        Kami berkomitmen untuk menawarkan solusi yang terjangkau tanpa mengorbankan kualitas pembelajaran. Dengan memberikan opsi pembayaran yang fleksibel dan transparan, siswa dapat memilih program yang sesuai dengan anggaran mereka.
        </p>
    </div>

    </div>
</div>

        
        {{--  --}}
    <section id="Popular-Courses"
        class="max-w-[1200px] mx-auto flex flex-col p-[70px_82px_0px] gap-[30px] bg-[#f5f7fa] rounded-[32px]">
        <div class="flex flex-col gap-[30px] items-center text-center">
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Rekomendasi Kelas</h2>
                {{-- <p class="text-[#6D7786] text-lg -tracking-[2%]">Catching up the on demand skills and high paying career
                    this year</p> --}}
            </div>
            <div class="bg-gradient-to-r from-sky-100 to-blue-200 w-fit p-[8px_16px] rounded-full border border-[#adc7fe] flex items-center gap-[6px]">
                <div>
                    <img src="assets/icon/medal-star.svg" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#1E90FF]">Kelas Terpopuler</p>
            </div>
            
        </div>
        <div class="relative">
            <button class="btn-prev absolute rotate-180 -left-[52px] top-[216px]">
                <img src="assets/icon/arrow-right.svg" alt="icon">
            </button>
            <button class="btn-prev absolute -right-[52px] top-[216px]">
                <img src="assets/icon/arrow-right.svg" alt="icon">
            </button>

            <!-- Course Slider -->
            @if($courses->count() > 0)
            <div id="course-slider" class="w-full">
            @foreach($courses as $course)
                <div class="course-card w-1/3 px-3 pb-[70px] mt-[2px]">
                    <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:ring-2 hover:ring-[#adc7fe]">
                        <a href="{{ route('frontend.details', $course->slug) }}" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            @if($course->youtube_thumbnail_url)
                                <iframe width="100%" height="100%" src="{{ $course->youtube_thumbnail_url }}?autoplay=0&mute=1" 
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen></iframe>
                            @endif
                        </a>
                        <div class="flex flex-col px-4 gap-[10px]">
                            <a href="{{ route('frontend.details', $course->slug) }}" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">{{ $course->title }}</a>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-[2px]">
                                    @for($i = 0; $i < 5; $i++)
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    @endfor
                                </div>
                                <p class="text-right text-[#6D7786]">{{ $course->enrollments->count() }} students</p>
                            </div>
                            <div class="flex justify-between items-center">
                                @auth
                                    @if($course->enrollments->contains('user_id', auth()->id()))
                                        <!-- Menampilkan "Joined" jika user sudah terdaftar -->
                                        <p class="font-bold text-lg text-green-600">Joined</p>
                                    @else
                                        <!-- Menampilkan harga jika user belum terdaftar -->
                                        <p class="font-bold text-lg text-[#1F2937]">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                                    @endif
                                @else
                                    <!-- Menampilkan harga jika user belum login -->
                                    <p class="font-bold text-lg text-[#1F2937]">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                                @endauth
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                    <img src="{{ $course->instructor->profile_picture_url }}" 
                                    class="w-full h-full object-cover" 
                                    alt="Instructor Avatar">
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
            
        </div>

        @else
    <p>No courses available</p>
        @endif

    </section>

    <div class="flex justify-center mt-10">
        <a href="{{ route('frontend.allCourses') }}" class="bg-blue-600 text-white py-3 px-6 lg:py-4 lg:px-8 text-lg lg:text-2xl rounded-full">
            Semua Kelas
        </a>
    </div>
{{-- Member --}}
<div class="container mx-auto py-10">
    <h1 class="text-4xl font-bold text-center mb-8">Karya Member</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform hover:scale-105 transition-all">
            <img src="https://fomu.co.id/wp-content/uploads/2023/10/slider-1.jpg" alt="Karya 1" class="w-full">
            <div class="p-4">
                <p class="text-sm text-gray-600">ASMR LACI DARI 3D PRINT</p>
                <p class="text-xs text-gray-500">7 Minggu Lalu</p>
            </div>
        </div>
        <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform hover:scale-105 transition-all">
            <img src="https://fomu.co.id/wp-content/uploads/2023/10/slider-1.jpg" alt="Karya 2" class="w-full">
            <div class="p-4">
                <p class="text-sm text-gray-600">CETAK LACI DARI 3D PRINT</p>
                <p class="text-xs text-gray-500">7 Minggu Lalu</p>
            </div>
        </div>
        <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform hover:scale-105 transition-all">
            <img src="https://fomu.co.id/wp-content/uploads/2023/10/slider-1.jpg" alt="Karya 3" class="w-full">
            <div class="p-4">
                <p class="text-sm text-gray-600">ASMR LACI DARI 3D PRINT</p>
                <p class="text-xs text-gray-500">7 Minggu Lalu</p>
            </div>
        </div>
        <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform hover:scale-105 transition-all">
            <img src="https://fomu.co.id/wp-content/uploads/2023/10/slider-1.jpg" alt="Karya 4" class="w-full">
            <div class="p-4">
                <p class="text-sm text-gray-600">CETAK LACI DARI 3D PRINT</p>
                <p class="text-xs text-gray-500">7 Minggu Lalu</p>
            </div>
        </div>
    </div>
</div>
{{--  --}}
    <!-- Clients -->
    <div class="relative overflow-hidden pt-4" id="testimonial">
        <div class="relative z-10">
            <div class="max-w-5xl px-4 xl:px-0 mx-auto">
            <div class="mb-4 text-center">
                <h2 class="font-bold text-[40px] leading-[60px]">Patner Kami</h2>
            </div>

                <div class="flex justify-between gap-6">
                    <svg class="py-3 lg:py-5 w-16 h-auto md:w-20 lg:w-24 text-neutral-400"
                        enable-background="new 0 0 2499 614" viewBox="0 0 2499 614" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m431.7 0h-235.5v317.8h317.8v-235.5c0-45.6-36.7-82.3-82.3-82.3zm-308.9 0h-40.5c-45.6 0-82.3 36.7-82.3 82.3v40.5h122.8zm-122.8 196.2h122.8v122.8h-122.8zm392.5 317.8h40.5c45.6 0 82.3-36.7 82.3-82.3v-39.2h-122.8zm-196.3-121.5h122.8v122.8h-122.8zm-196.2 0v40.5c0 45.6 36.7 82.3 82.3 82.3h40.5v-122.8zm828-359.6h-48.1v449.4h254.5v-43h-206.4zm360.8 119c-93.7 0-159.5 69.6-159.5 169.6v11.5c1.3 43 20.3 83.6 51.9 113.9 30.4 27.9 69.6 44.3 111.4 44.3h6.3c44.3 0 86.1-16.5 119-44.3l1.3-1.3-21.5-35.4-2.5 1.3c-26.6 24.1-59.5 38-94.9 38-58.2 0-117.7-38-121.5-122.8h243.1v-2.5s1.3-15.2 1.3-22.8c-.3-91.2-53.4-149.5-134.4-149.5zm-108.9 134.2c10.1-57 51.9-93.7 106.3-93.7 40.5 0 84.8 24.1 88.6 93.7zm521.6-96.2v16.5c-20.3-34.2-58.2-55.7-97.5-55.7h-3.8c-86.1 0-145.6 68.4-145.6 168.4 0 101.3 57 169.6 141.8 169.6 67.1 0 97.5-40.5 107.6-58.2v49.4h45.6v-447h-46.8v157zm-98.8 257c-59.5 0-98.7-50.6-98.7-126.6 0-73.4 41.8-125.3 100-125.3 49.4 0 98.7 39.2 98.7 125.3 0 93.7-51.9 126.6-100 126.6zm424.1-250.7v2.5c-8.9-15.2-36.7-48.1-103.8-48.1-84.8 0-140.5 64.6-140.5 163.3s58.2 165.8 144.3 165.8c46.8 0 78.5-16.5 100-50.6v44.3c0 62-39.2 97.5-108.9 97.5-29.1 0-59.5-7.6-86.1-21.5l-2.5-1.3-17.7 39.2 2.5 1.3c32.9 16.5 69.6 25.3 105.1 25.3 74.7 0 154.4-38 154.4-143.1v-311.3h-46.8zm-93.7 241.8c-62 0-102.5-48.1-102.5-122.8 0-76 35.4-119 96.2-119 67.1 0 98.7 39.2 98.7 119 1.3 78.5-31.6 122.8-92.4 122.8zm331.7-286.1c-93.7 0-158.2 69.6-158.2 168.4v11.4c1.3 43 20.3 83.6 51.9 113.9 30.4 27.9 69.6 44.3 111.4 44.3h6.3c44.3 0 86.1-16.5 119-44.3l1.3-1.3-22.8-35.4-2.5 1.3c-26.6 24.1-59.5 38-94.9 38-58.2 0-117.7-38-121.5-122.8h244.2v-2.5s1.3-15.2 1.3-22.8c0-89.9-53.2-148.2-135.5-148.2zm-107.6 134.2c10.1-57 51.9-93.7 106.3-93.7 40.5 0 84.8 24.1 88.6 93.7zm440.6-127.9c-6.3-1.3-11.4-1.3-17.7-2.5-44.3 0-81 27.9-100 74.7v-72.2h-46.8l1.3 320.3v2.5h48.1v-135.4c0-20.3 2.5-41.8 8.9-60.8 15.2-49.4 49.4-81 89.9-81 5.1 0 10.1 0 15.2 1.3h2.5v-46.8z"
                            fill="currentColor" />
                    </svg>

                    <svg class="py-3 lg:py-5 w-16 h-auto md:w-20 lg:w-24 text-neutral-400"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="-4.126838974812941 0.900767442746961 939.436838974813 230.18142889845947" width="2500"
                        height="607">
                        <path
                            d="M667.21 90.58c-13.76 0-23.58 4.7-28.4 13.6l-2.59 4.82V92.9h-22.39v97.86h23.55v-58.22c0-13.91 7.56-21.89 20.73-21.89 12.56 0 19.76 7.77 19.76 21.31v58.8h23.56v-63c0-23.3-12.79-37.18-34.22-37.18zm-114.21 0c-27.79 0-45 17.34-45 45.25v13.74c0 26.84 17.41 43.51 45.44 43.51 18.75 0 31.89-6.87 40.16-21l-14.6-8.4c-6.11 8.15-15.87 13.2-25.55 13.2-14.19 0-22.66-8.76-22.66-23.44v-3.89h65.73v-16.23c0-26-17.07-42.74-43.5-42.74zm22.09 43.15h-44.38v-2.35c0-16.11 7.91-25 22.27-25 13.83 0 22.09 8.76 22.09 23.44zm360.22-56.94V58.07h-81.46v18.72h28.56V172h-28.56v18.72h81.46V172h-28.57V76.79zM317.65 55.37c-36.38 0-59 22.67-59 59.18v19.74c0 36.5 22.61 59.18 59 59.18s59-22.68 59-59.18v-19.74c-.01-36.55-22.65-59.18-59-59.18zm34.66 80.27c0 24.24-12.63 38.14-34.66 38.14S283 159.88 283 135.64v-22.45c0-24.24 12.64-38.14 34.66-38.14s34.66 13.9 34.66 38.14zm98.31-45.06c-12.36 0-23.06 5.12-28.64 13.69l-2.53 3.9V92.9h-22.4v131.53h23.56v-47.64l2.52 3.74c5.3 7.86 15.65 12.55 27.69 12.55 20.31 0 40.8-13.27 40.8-42.93v-16.64c0-21.37-12.63-42.93-41-42.93zM468.06 149c0 15.77-9.2 25.57-24 25.57-13.8 0-23.43-10.36-23.43-25.18v-14.72c0-15 9.71-25.56 23.63-25.56 14.69 0 23.82 9.79 23.82 25.56zm298.47-90.92L719 190.76h23.93l9.1-28.44h54.64l.09.28 9 28.16h23.92L792.07 58.07zm-8.66 85.53l21.44-67.08 21.22 67.08zM212.59 95.12a57.27 57.27 0 0 0-4.92-47.05 58 58 0 0 0-62.4-27.79A57.29 57.29 0 0 0 102.06 1a57.94 57.94 0 0 0-55.27 40.14A57.31 57.31 0 0 0 8.5 68.93a58 58 0 0 0 7.13 67.94 57.31 57.31 0 0 0 4.92 47A58 58 0 0 0 83 211.72 57.31 57.31 0 0 0 126.16 231a57.94 57.94 0 0 0 55.27-40.14 57.3 57.3 0 0 0 38.28-27.79 57.92 57.92 0 0 0-7.12-67.95zM126.16 216a42.93 42.93 0 0 1-27.58-10c.34-.19 1-.52 1.38-.77l45.8-26.44a7.43 7.43 0 0 0 3.76-6.51V107.7l19.35 11.17a.67.67 0 0 1 .38.54v53.45A43.14 43.14 0 0 1 126.16 216zm-92.59-39.54a43 43 0 0 1-5.15-28.88c.34.21.94.57 1.36.81l45.81 26.45a7.44 7.44 0 0 0 7.52 0L139 142.52v22.34a.67.67 0 0 1-.27.6l-46.3 26.72a43.14 43.14 0 0 1-58.86-15.77zm-12-100A42.92 42.92 0 0 1 44 57.56V112a7.45 7.45 0 0 0 3.76 6.51l55.9 32.28L84.24 162a.68.68 0 0 1-.65.06L37.3 135.33a43.13 43.13 0 0 1-15.77-58.87zm159 37l-55.9-32.28L144 70a.69.69 0 0 1 .65-.06l46.29 26.73a43.1 43.1 0 0 1-6.66 77.76V120a7.44 7.44 0 0 0-3.74-6.54zm19.27-29c-.34-.21-.94-.57-1.36-.81L152.67 57.2a7.44 7.44 0 0 0-7.52 0l-55.9 32.27V67.14a.73.73 0 0 1 .28-.6l46.29-26.72a43.1 43.1 0 0 1 64 44.65zM78.7 124.3l-19.36-11.17a.73.73 0 0 1-.37-.54V59.14A43.09 43.09 0 0 1 129.64 26c-.34.19-.95.52-1.38.77l-45.8 26.44a7.45 7.45 0 0 0-3.76 6.51zm10.51-22.67l24.9-14.38L139 101.63v28.74l-24.9 14.38-24.9-14.38z"
                            fill="currentColor" />
                    </svg>

                    <svg class="py-3 lg:py-5 w-16 h-auto md:w-20 lg:w-24 text-neutral-400" fill="none"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2428 1002">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M311.5 389.8h191.8l67 117.5 77.8-117.5h178.3L682.7 590.7l154 220.7H648.1l-77.8-135.8-91.7 135.8h-175l153.2-220.7-145.3-200.9Z"
                            fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1279.3 640.7H955.4c2.9 26 10 45.2 21 58a76.5 76.5 0 0 0 61.1 27.3c16 0 31.5-4 45.3-12 8.8-5 18.2-13.7 28.2-26.5l159.2 14.7c-24.4 42.4-53.7 72.7-88 91.2-34.5 18.2-83.8 27.5-148.2 27.5-55.8 0-99.7-7.9-131.8-23.6a193.2 193.2 0 0 1-79.6-75c-21-34.4-31.6-74.6-31.6-121 0-65.8 21.2-119.2 63.3-159.8 42.3-40.8 100.6-61.3 175-61.3 60.3 0 108 9.2 142.8 27.5a184 184 0 0 1 79.8 79.3c18.3 34.7 27.4 79.8 27.4 135.3v18.4ZM1115 563.3c-3.2-31.3-11.6-53.7-25.2-67.1a73.1 73.1 0 0 0-53.8-20.3 73.6 73.6 0 0 0-61.6 30.6c-9.7 12.7-16 31.6-18.5 56.8H1115Zm137-173.5h168.3l81.9 267.1 84.5-267H1750l-179.1 421.5h-143.3L1252 389.8Zm463.2 212c0-64.3 21.7-117.4 65-159 43.5-41.7 102-62.6 176-62.6 84.4 0 148.2 24.5 191.3 73.5 34.6 39.4 52 88 52 145.8 0 64.7-21.5 117.8-64.5 159.3-43 41.3-102.4 62-178.5 62-67.7 0-122.5-17.1-164.3-51.5-51.4-42.6-77-98.4-77-167.6Zm162-.5c0 37.7 7.5 65.5 22.8 83.4a72 72 0 0 0 57.3 27.1c23.4 0 42.5-9 57.4-26.7 15-17.8 22.5-46 22.5-85.4 0-36.4-7.6-63.7-22.7-81.5a70.5 70.5 0 0 0-56-26.7c-23.5 0-43 9-58.3 27-15.4 18.2-23 45.9-23 82.8ZM2363.1.1a64 64 0 0 1 0 127.9 64 64 0 0 1 0-128Z"
                            fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1912.1 671.5c220.3-135 326.4-327 334-419.2 8.7-106.7-71-235.9-358.9-238-345 3.6-790 158.3-1163.6 360.4h138c315.8-152.6 672-266.2 1000.8-275.2 287.7-7.8 304.4 149.2 302 199-3.6 71-74.7 234.5-252.3 373Zm-1315.7-222-36 22.7 10 17.5 26-40.1ZM419.8 567.5C212 717 57 873.2.8 1001.9 77.8 897.1 217 771 394.9 647l40.4-58.1-15.5-21.4Z"
                            fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2036.3 580a819.8 819.8 0 0 0 114.2-122.8l-3-3.5c-8-9.2-17-17.5-26.5-25-21 39.8-50 83.7-88.2 128.3 1.6 7 2.8 14.7 3.5 23Z"
                            fill="currentColor" />
                    </svg>

                    <svg class="py-3 lg:py-5 w-16 h-auto md:w-20 lg:w-24 text-neutral-400" fill="none"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127 33">
                        <path d="M9.3 16.5C9.3 9 14.3 2.7 21.2.7a16.5 16.5 0 1 0 0 31.6c-6.9-2-11.9-8.3-11.9-15.8Z"
                            fill="currentColor" />
                        <path d="M21.7 10c4 0 7.4 2.8 8.5 6.4a8.9 8.9 0 1 0-17 0c1-3.6 4.4-6.3 8.5-6.3Z"
                            fill="currentColor" />
                        <path d="M24.8 19.4c0 3-2 5.5-4.8 6.3A6.6 6.6 0 1 0 20 13c2.8.8 4.8 3.4 4.8 6.4Z"
                            fill="currentColor" />
                        <path
                            d="M39.6 13.5A4.4 4.4 0 0 1 44 9.1h1.3v2.7l-1 .2-1 .6-.2.4-.1.5h2.3v3H43v9.2h-3.4v-9.3h-1.3v-2.9h1.3ZM55.7 13.5h3.4v6.1a6.9 6.9 0 0 1-1.7 4.6 6 6 0 0 1-4.5 1.8c-1 0-1.8-.1-2.5-.5a6 6 0 0 1-3.2-3.4c-.3-.8-.4-1.6-.4-2.5v-6H50v6c0 .5 0 1 .2 1.3l.5 1c.2.4.5.6.9.8.3.2.8.3 1.2.3a2.6 2.6 0 0 0 2.1-1c.3-.3.4-.7.5-1l.2-1.4v-6ZM61.2 25.7V9.5h3.4v16.2h-3.4ZM66.9 25.7V9.5h3.3v16.2H67ZM78.5 21.2l3.3-7.7h3.7l-5.7 12.2h-2.7l-5.6-12.2H75l3.4 7.7ZM87 13.5h3.3v12.2H87V13.5Zm1.6-5 .8.1.6.4.4.7.2.7a1.9 1.9 0 0 1-.6 1.4l-.6.4a2 2 0 0 1-.8.1c-.5 0-1-.2-1.3-.5a2 2 0 0 1-.4-2.1c0-.3.2-.5.4-.7l.6-.4.7-.1ZM98.8 13.2a6.7 6.7 0 0 1 4.8 1.9 6.3 6.3 0 0 1 1.9 5.7h-9.8a3.3 3.3 0 0 0 3.2 2.2c.5 0 1-.1 1.4-.4.5-.2.9-.5 1.2-1h3.7c-.2.7-.5 1.3-1 1.8a6.1 6.1 0 0 1-3.3 2.3 7 7 0 0 1-6.9-1.6 6.1 6.1 0 0 1-2-4.5 6.1 6.1 0 0 1 2-4.5c.7-.6 1.4-1 2.2-1.4.8-.3 1.7-.5 2.6-.5Zm3.2 5.2c-.3-.6-.7-1.1-1.2-1.5-.6-.4-1.3-.7-2-.7s-1.4.3-2 .7c-.5.4-.9.9-1.1 1.5h6.3ZM123 13.5h3.6l-5 12.2H119l-2.5-6.5-2.5 6.5h-2.7l-5-12.2h3.6l2.7 7 2.8-7h2.2l2.8 7 2.7-7Z"
                            fill="currentColor" />
                    </svg>

                    <svg class="py-3 lg:py-5 w-16 h-auto md:w-20 lg:w-24 text-neutral-400"
                        xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 88 22" xml:space="preserve"
                        enable-background="new 0 0 88 22">
                        <path
                            d="M36.3 14.6a7.3 7.3 0 0 1-5.6 2.8c-3.8 0-6.8-2.7-6.8-6.2a6 6 0 0 1 2-4.5A6 6 0 0 1 30.5 5c2.2 0 4.3 1 5.6 2.8l-2.5 1.8a3.7 3.7 0 0 0-3.1-1.8 3.5 3.5 0 0 0-3.5 3.5c.1 2 1.7 3.5 3.6 3.5 1.3 0 2.5-.6 3.2-1.7l2.5 1.5z"
                            fill="currentColor" />
                        <path d="M37.7 0H40.8V17.1H37.7z" fill="currentColor" />
                        <path
                            d="M49.1 14.7c2 0 3.7-1.6 3.8-3.6-.1-2-1.8-3.6-3.8-3.6s-3.7 1.6-3.8 3.6c.1 2 1.7 3.6 3.8 3.6m0-9.8c1.7-.1 3.4.5 4.7 1.7 1.3 1.2 2 2.8 2.1 4.5a6.4 6.4 0 0 1-2.1 4.5 6.4 6.4 0 0 1-4.7 1.7c-3.8 0-6.8-2.7-6.8-6.2s3-6.2 6.8-6.2"
                            fill="currentColor" />
                        <path d="M55.3 5.1 59 5.1 62 11.5 65.2 5.1 68.6 5.1 62 17.8z" fill="currentColor" />
                        <path
                            d="M77.5 9.4a3 3 0 0 0-2.9-1.9c-1.3 0-2.5.7-3.1 1.9h6zm2 6.3a7 7 0 0 1-4.6 1.6c-3.8 0-6.8-2.7-6.8-6.2 0-1.7.7-3.3 1.9-4.5a6 6 0 0 1 4.6-1.7c1.7-.1 3.3.6 4.5 1.8s1.8 2.8 1.7 4.5v.8h-9.6a3.9 3.9 0 0 0 6.5 1.5l1.8 2.2zm2.8-5.3c0-2.9 2.2-5.2 5.7-5.2V8c-.7 0-1.5.3-2 .8s-.7 1.3-.6 2v6.3h-3.1v-6.7z"
                            fill="currentColor" />
                        <path
                            d="M9.7 5.6a5 5 0 0 0-8.3-3.5C0 3.5-.4 5.6.3 7.4s2.5 3 4.5 3h4.9V5.6zm1.4 0a5 5 0 0 1 8.3-3.5c1.4 1.4 1.8 3.5 1.1 5.3s-2.5 3-4.5 3h-4.9V5.6zm0 11a5 5 0 0 0 8.3 3.5c1.4-1.4 1.8-3.5 1.1-5.3s-2.5-3-4.5-3h-4.9v4.8zm-6.3 3.5c1.9 0 3.5-1.5 3.5-3.5v-3.5H4.8c-1.9 0-3.5 1.5-3.5 3.5s1.6 3.5 3.5 3.5zm4.9-3.5a5 5 0 0 1-8.3 3.5C0 18.7-.4 16.6.3 14.8s2.5-3 4.5-3h4.9v4.8z"
                            fill="currentColor" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <!-- End Clients -->

    <script>
        function checkResolution() {
            const mobileMenu = document.getElementById("testimonial");

            if (window.innerWidth < 768) {
                document.getElementById("testimonial").style.display = "none";
            } else {
                document.getElementById("testimonial").style.display = "block";
            }
        }

        checkResolution();

        window.onresize = checkResolution;
    </script>

    <!-- Why SocioEdu -->
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-800 dark:text-neutral-500 sm:text-4xl">Mengapa Kami?
                </p>
                <p class="mt-6 text-lg leading-8 text-gray-600">Kami menawarkan berbagai metode pembelajaran yang menarik. Intip bagaimana Cakap menyajikannya secara efektif, interaktif, dan dua arah.</p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div
                                class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                <ion-icon name="school-outline" class="text-white h-6 w-6"></ion-icon>
                            </div>
                            Guru Berpengalaman
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">Guru kami memberikan pengalaman belajar yang progresif dan efektif.</dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div
                                class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                <ion-icon name="ribbon-outline" class="text-white h-6 w-6"></ion-icon>
                            </div>
                            Pelatih Bersertifikat
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">Kurikulum kami dirancang oleh lembaga pembelajaran yang kredibel.</dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div
                                class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                <ion-icon name="book-outline" class="text-white h-6 w-6"></ion-icon>
                            </div>
                            Metode Pembelajaran
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">Kami menyediakan berbagai metode pembelajaran, dari privat hingga kelompok!</dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div
                                class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                <ion-icon name="laptop-outline" class="text-white h-6 w-6"></ion-icon>
                            </div>
                            Multiplatform
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">Nikmati pembelajaran online di mana saja, melalui smartphone atau desktop.</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    <!-- End Why SocioEdu -->

    <!-- Benefit -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32">
            <div>
                <img src="../assets/images/logos/foto10.png"
                    alt="Features Image"
                    style="width: 800px; height: auto;">
            </div>

            <!-- End Col -->

            <div class="mt-5 sm:mt-10 lg:mt-0">
                <div class="space-y-6 sm:space-y-8">
                    <!-- Title -->
                    <div class="space-y-2 md:space-y-4">
                        <h2 class="font-bold text-3xl lg:text-4xl text-gray-800 dark:text-neutral-500">
                            Manfaat
                        </h2>
                        <p class="text-gray-500 dark:text-neutral-500">
                            Nikmati berbagai manfaat dan fasilitas menarik dalam komunitas belajar Innovative Elearning
                        </p>
                    </div>
                    <!-- End Title -->

                    <!-- List -->
                    <ul class="space-y-2 sm:space-y-4">
                        <li class="flex gap-x-3">
                            <span
                                class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <div class="grow">
                                <span class="text-sm sm:text-base text-gray-500 dark:text-neutral-500">
                                    Tutor Ahli
                                </span>
                            </div>
                        </li>
                        <li class="flex gap-x-3">
                            <span
                                class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <div class="grow">
                                <span class="text-sm sm:text-base text-gray-500 dark:text-neutral-500">
                                    Portofolio Proyek Nyata
                                </span>
                            </div>
                        </li>
                        <li class="flex gap-x-3">
                            <span
                                class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <div class="grow">
                                <span class="text-sm sm:text-base text-gray-500 dark:text-neutral-500">
                                    Meningkatkan personal branding.
                                </span>
                            </div>
                        </li>
                        <li class="flex gap-x-3">
                            <span
                                class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <div class="grow">
                                <span class="text-sm sm:text-base text-gray-500 dark:text-neutral-500">
                                    Jaringan Profesional
                                </span>
                            </div>
                        </li>
                        <li class="flex gap-x-3">
                            <span
                                class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <div class="grow">
                                <span class="text-sm sm:text-base text-gray-500 dark:text-neutral-500">
                                    Mendapatkan Proyek Freelance
                                </span>
                            </div>
                        </li>
                        <li class="flex gap-x-3">
                            <span
                                class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <div class="grow">
                                <span class="text-sm sm:text-base text-gray-500 dark:text-neutral-500">
                                    Materi Video
                                </span>
                            </div>
                        </li>
                        <li class="flex gap-x-3">
                            <span
                                class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <div class="grow">
                                <span class="text-sm sm:text-base text-gray-500 dark:text-neutral-500">
                                    Akses Belajar 24/7
                                </span>
                            </div>
                        </li>
                        <li class="flex gap-x-3">
                            <span
                                class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <div class="grow">
                                <span class="text-sm sm:text-base text-gray-500 dark:text-neutral-500">
                                    Tugas Praktis
                                </span>
                            </div>
                        </li>
                        <li class="flex gap-x-3">
                            <span
                                class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <div class="grow">
                                <span class="text-sm sm:text-base text-gray-500 dark:text-neutral-500">
                                    Sertifikat
                                </span>
                            </div>
                        </li>
                    </ul>
                    <!-- End List -->
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Benefit -->

    {{--  --}}

    <!-- FAQ -->
    <section id="FAQ" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[100px]">
        <div class="flex flex-col items-center mb-10">
            <h2 class="text-3xl font-bold text-center mb-4">Pertanyaan yang Sering Diajukan</h2>
            <p class="text-lg text-center text-gray-600">Temukan jawaban atas beberapa pertanyaan yang paling umum di bawah ini.</p>
        </div>
        <div class="flex justify-center">
            <div class="flex flex-col gap-[30px] w-[552px] shrink-0">
                <div class="flex flex-col p-5 rounded-2xl bg-[#F5F8FA] has-[.hide]:bg-transparent border-t-4 border-[#3c64ff] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-1">
                        <span class="font-semibold text-lg text-left">Apakah pemula bisa mengikuti kursus?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-1" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Ya, kami telah menyediakan berbagai macam kursus dari tingkat pemula hingga menengah untuk mempersiapkan karir besar Anda berikutnya.</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-[#F5F8FA] has-[.hide]:bg-transparent border-t-4 border-[#3c64ff] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-2">
                        <span class="font-semibold text-lg text-left">Berapa lama waktu yang dibutuhkan untuk implementasi?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-2" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore placeat ut nostrum aperiam mollitia tempora aliquam perferendis explicabo eligendi commodi.</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-[#F5F8FA] has-[.hide]:bg-transparent border-t-4 border-[#3c64ff] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-3">
                        <span class="font-semibold text-lg text-left">Apakah Anda menyediakan program jaminan pekerjaan?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-3" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae itaque facere ipsum animi sunt iure!</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-[#F5F8FA] has-[.hide]:bg-transparent border-t-4 border-[#3c64ff] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-4">
                        <span class="font-semibold text-lg text-left">Bagaimana cara mendapatkan sertifikat kursus?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-4" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae itaque facere ipsum animi sunt iure!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQ -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection


