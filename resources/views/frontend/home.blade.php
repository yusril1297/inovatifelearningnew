@extends('layouts.front')

@section('content')
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Slider</title>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Tailwind CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <style>
        .bg-with-shadow {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        
        /* Custom animation for slide elements */
        .swiper-slide-active .slide-content {
            opacity: 1 !important;
            animation: fadeIn 1s ease forwards;
        }
        
        /* Custom responsive padding */
        @media (max-width: 640px) {
            .hero-section {
                padding-top: 3rem;
                padding-bottom: 3rem;
            }
        }
        
        /* Make sure images don't overflow */
        .hero-image img {
            max-width: 100%;
            height: auto;
        }
        
        /* Additional Swiper styles */
        .swiper-container {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        
        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100% !important;
        }
        
        /* Fix for fade effect */
        .swiper-slide:not(.swiper-slide-active) {
            opacity: 0;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="hero-section w-full mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 md:py-20 lg:py-28 bg-blue-500 bg-opacity-50 bg-with-shadow">
        <!-- Slider Wrapper -->
        <div class="swiper-container max-w-7xl mx-auto">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="slide-content flex flex-col lg:flex-row items-center justify-between gap-6 sm:gap-8 lg:gap-12 px-4 sm:px-8 md:px-12 opacity-0">
                        <!-- Text Content -->
                        <div class="w-full lg:w-1/2 text-center lg:text-left mb-8 lg:mb-0">
                            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 dark:text-neutral-600 leading-tight mb-4">
                                Belajar Bersama
                            </h1>
                            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 dark:text-neutral-600 leading-tight mb-4">
                                Mentor Berpengalaman
                            </h1>
                            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-semibold text-gray-800 dark:text-neutral-600 mb-6">
                                Sudah dimanfaatkan oleh 400+ member di seluruh dunia.
                            </h2>
                            <div class="flex justify-center lg:justify-start items-center gap-4 mt-8 lg:mt-12">
                                <a href="#courses"
                                    class="bg-blue-600 text-white py-2 px-4 sm:py-3 sm:px-6 lg:py-4 lg:px-8 text-base sm:text-lg lg:text-xl rounded-full flex items-center gap-2 shadow-lg hover:bg-blue-700 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                                    </svg>
                                    Belajar Sekarang
                                </a>
                            </div>
                        </div>
            
                        <!-- Image -->
                        <div class="hero-image w-full lg:w-1/2 flex justify-center lg:justify-end">
                            <img src="assets/icon/foto5.png"
                                alt="Gambar Belajar" class="rounded-lg shadow-lg max-w-full">
                        </div>
                    </div>
                </div>
                
                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="slide-content flex flex-col lg:flex-row items-center justify-between gap-6 sm:gap-8 lg:gap-12 px-4 sm:px-8 md:px-12 opacity-0">
                        <!-- Text Content -->
                        <div class="w-full lg:w-1/2 text-center lg:text-left mb-8 lg:mb-0">
                            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 dark:text-neutral-600 leading-tight mb-4">
                                Pelatihan Profesional
                            </h1>
                            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 dark:text-neutral-600 leading-tight mb-4">
                                Untuk Semua Orang
                            </h1>
                            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-semibold text-gray-800 dark:text-neutral-600 mb-6">
                                Bergabung dengan komunitas lebih dari 500+ member.
                            </h2>
                            <div class="flex justify-center lg:justify-start items-center gap-4 mt-8 lg:mt-12">
                                <a href="#courses"
                                    class="bg-blue-600 text-white py-2 px-4 sm:py-3 sm:px-6 lg:py-4 lg:px-8 text-base sm:text-lg lg:text-xl rounded-full flex items-center gap-2 shadow-lg hover:bg-blue-700 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                                    </svg>
                                    Belajar Sekarang
                                </a>
                            </div>
                        </div>
            
                        <!-- Image -->
                        <div class="hero-image w-full lg:w-1/2 flex justify-center lg:justify-end">
                            <img src="assets/icon/foto5.png" 
                                alt="Gambar Pelatihan" class="rounded-lg shadow-lg max-w-full">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Add Pagination -->
            <div class="swiper-pagination mt-8"></div>
            
            <!-- Add Navigation -->
            {{-- <div class="swiper-button-next hidden  md:flex text-blue-600"></div>
            <div class="swiper-button-prev hidden  md:flex text-blue-600"></div> --}}
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Swiper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Swiper
            const swiper = new Swiper('.swiper-container', {
                // Optional parameters
                loop: true,
                effect: 'fade', // Use fade effect
                fadeEffect: {
                    crossFade: true // Enable cross-fade effect
                },
                speed: 1000,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                
                // If you need pagination
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                
                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                
                // Make sure slide has full width
                slidesPerView: 1,
                
                // On init event
                on: {
                    init: function() {
                        setTimeout(() => {
                            const activeSlide = document.querySelector('.swiper-slide-active .slide-content');
                            if (activeSlide) {
                                activeSlide.classList.add('animate__animated', 'animate__fadeIn');
                            }
                        }, 100);
                    },
                    slideChangeTransitionStart: function() {
                        document.querySelectorAll('.slide-content').forEach(content => {
                            content.style.opacity = 0;
                            content.classList.remove('animate__animated', 'animate__fadeIn');
                        });
                    },
                    slideChangeTransitionEnd: function() {
                        setTimeout(() => {
                            const activeSlide = document.querySelector('.swiper-slide-active .slide-content');
                            if (activeSlide) {
                                activeSlide.classList.add('animate__animated', 'animate__fadeIn');
                            }
                        }, 100);
                    }
                }
            });
        });
    </script>
    <!-- End Swiper JS -->

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
        <!DOCTYPE html>

        <head>
    <!-- Add Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<div class="container mx-auto py-20 px-4">
  <h2 class="text-3xl font-extrabold text-center mb-12 text-gray-900">Keunggulan Kami</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

    <!-- Card 1 -->
    <div class="border-2 rounded-lg shadow-xl p-6 flex flex-col items-center bg-white hover:shadow-2xl transition-all">
      <div class="flex flex-col items-center mb-6">
        <i class="fas fa-star text-5xl text-indigo-600 mb-4"></i>
        <h3 class="text-2xl font-semibold text-gray-800 text-center">Rating</h3>
      </div>
      <div class="text-center">
        <span id="ratingCounter" class="text-5xl font-bold text-indigo-600">0</span>
      </div>
      <p class="text-gray-600 mt-6 text-lg text-center">
        Membantu siswa memilih kursus berkualitas, memberikan umpan balik cepat untuk perbaikan, menyesuaikan materi dengan preferensi pengguna, menjaga kualitas pengajaran, dan membangun komunitas belajar yang terhubung.
      </p>
    </div>

    <!-- Card 2 -->
    <div class="border-2 rounded-lg shadow-xl p-6 flex flex-col items-center bg-white hover:shadow-2xl transition-all">
      <div class="flex flex-col items-center mb-6">
        <i class="fas fa-smile-beam text-5xl text-yellow-500 mb-4"></i>
        <h3 class="text-2xl font-semibold text-gray-800 text-center">Kepuasan</h3>
      </div>
      <div class="text-center">
        <span id="satisfactionCounter" class="text-5xl font-bold text-yellow-500">0</span>
      </div>
      <p class="text-gray-600 mt-6 text-lg text-center">
        Kami juga menjaga kualitas pengajaran dengan menghadirkan pengajaran yang profesional dan berbobot, serta membangun komunitas belajar yang terhubung, di mana siswa dapat saling mendukung dan berkembang bersama.
      </p>
    </div>

    <!-- Card 3 -->
    <div class="border-2 rounded-lg shadow-xl p-6 flex flex-col items-center bg-white hover:shadow-2xl transition-all">
      <div class="flex flex-col items-center mb-6">
        <i class="fas fa-wallet text-5xl text-green-500 mb-4"></i>
        <h3 class="text-2xl font-semibold text-gray-800 text-center">Finance</h3>
      </div>
      <div class="text-center">
        <span id="financeCounter" class="text-5xl font-bold text-green-500">0</span>
      </div>
      <p class="text-gray-600 mt-6 text-lg text-center">
        Kami berkomitmen untuk menawarkan solusi yang terjangkau tanpa mengorbankan kualitas pembelajaran. Dengan memberikan opsi pembayaran yang fleksibel dan transparan, siswa dapat memilih program yang sesuai dengan anggaran mereka.
      </p>
    </div>

  </div>
</div>


<script>
    // Function to increment the counter
    function startCounter(elementId, targetValue, duration) {
        let startValue = 0;
        const increment = targetValue / (duration / 50);  // Increment per interval
        const counterElement = document.getElementById(elementId);

        const interval = setInterval(() => {
            startValue += increment;
            counterElement.textContent = Math.min(startValue, targetValue).toFixed(0);

            if (startValue >= targetValue) {
                clearInterval(interval);
            }
        }, 50);
    }

    // Call the function on page load to animate the counters
    window.onload = function() {
        startCounter('ratingCounter', 500, 2000); // Example: Rating counter reaches 500 in 2 seconds
        startCounter('satisfactionCounter', 750, 2500); // Satisfaction counter reaches 750 in 2.5 seconds
        startCounter('financeCounter', 1000, 3000); // Finance counter reaches 1000 in 3 seconds
    }
</script>

        
        {{--  --}}
    <section id="Popular-Courses"
    <div class="mx-[50px]">
    <div class="flex flex-col gap-[30px] items-center text-center">
        <div class="flex flex-col">
            <h2 class="font-bold text-[40px] leading-[60px]">Rekomendasi Kelas</h2>
        </div>
        <div class="bg-gradient-to-r from-sky-100 to-blue-200 w-fit p-[8px_16px] rounded-full border border-[#adc7fe] flex items-center gap-[6px]">
            <div>
                <img src="assets/icon/medal-star.svg" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#1E90FF]">Kelas Terpopuler</p>
        </div>
    </div>
    </div>


    <div class="relative mt-[30px]">
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
            <div class="course-card lg:w-1/3 md:w-1/3 w-full px-3 pb-[70px] mt-[2px]">
                <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:ring-2 hover:ring-[#adc7fe]">
                    <a href="{{ route('frontend.details', $course->slug) }}" class="thumbnail w-full h-[350px] shrink-0 rounded-[10px] overflow-hidden">
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
                                    <p class="font-bold text-lg text-green-600">Joined</p>
                                @else
                                    <p class="font-bold text-lg text-[#1F2937]">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                                @endif
                            @else
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
        @else
        <p>No courses available</p>
        @endif
    </div>
</div>
    </section>

    <div class="flex justify-center mt-10">
        <a href="{{ route('frontend.allCourses') }}" class="bg-blue-600 text-white py-3 px-6 lg:py-4 lg:px-8 text-lg lg:text-2xl rounded-full">
            Semua Kelas
        </a>
    </div>
      
 


{{-- Dokumentasi Mengajar --}}
<div class="w-full max-w-screen-3xl mx-auto px-12 py-20 min-h-screen bg-white">
    <!-- Judul -->
    <h2 class="text-3xl font-bold md:text-5xl md:leading-tight text-gray-800 text-center pb-10 mb-10">
        Dokumentasi Belajar
    </h2>

    <!-- Grid Foto -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
        <!-- Kartu 1 -->
        <div class="border-2 rounded-3xl overflow-hidden shadow-2xl hover:shadow-3xl transform hover:scale-105 transition duration-300 bg-white">
            <img src="assets/icon/dmm1.jpg" alt="Karya 1" class="w-full h-[22rem] object-cover">
            <div class="p-6 text-center">
                <p class="text-xl font-semibold text-gray-700">Kegiatan Mengajar</p>
                <p class="text-base text-gray-500 mt-3">Seorang guru sedang memberikan bimbingan kepada siswa, menunjuk layar laptop untuk menjelaskan materi secara langsung.</p>
            </div>
        </div>

        <!-- Kartu 2 -->
        <div class="border-2 rounded-3xl overflow-hidden shadow-2xl hover:shadow-3xl transform hover:scale-105 transition duration-300 bg-white">
            <img src="assets/icon/dd2.jpg" alt="Karya 2" class="w-full h-[22rem] object-cover">
            <div class="p-6 text-center">
                <p class="text-xl font-semibold text-gray-700">Kegiatan Mengajar</p>
                <p class="text-base text-gray-500 mt-3">Seorang anak dan teman sedang belajar bersama di meja, saling membantu menyelesaikan tugas dengan fokus dan kerjasama.</p>
            </div>
        </div>

        <!-- Kartu 3 -->
        <div class="border-2 rounded-3xl overflow-hidden shadow-2xl hover:shadow-3xl transform hover:scale-105 transition duration-300 bg-white">
            <img src="assets/icon/dd3.jpg" alt="Karya 3" class="w-full h-[22rem] object-cover">
            <div class="p-6 text-center">
                <p class="text-xl font-semibold text-gray-700">Kegiatan Mengajar</p>
                <p class="text-base text-gray-500 mt-3">Seorang guru sedang memberikan bimbingan kepada siswa, menunjuk layar laptop untuk menjelaskan materi secara langsung.</p>
            </div>
        </div>

        <!-- Kartu 4 -->
        <div class="border-2 rounded-3xl overflow-hidden shadow-2xl hover:shadow-3xl transform hover:scale-105 transition duration-300 bg-white">
            <img src="assets/icon/dd4.jpg" alt="Karya 4" class="w-full h-[22rem] object-cover">
            <div class="p-6 text-center">
                <p class="text-xl font-semibold text-gray-700">Kegiatan Mengajar</p>
                <p class="text-base text-gray-500 mt-3">Seorang anak sedang fokus belajar di depan laptop, membuka materi pelajaran online dan mencatat poin-poin penting di buku catatannya.</p>
            </div>
        </div>
    </div>
</div>



<!-- Tentor Kami -->
<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* Optional: Custom background image styling */
    .background-image {
        background-image: url('path/to/your-image.jpg');
        background-size: cover;
        background-position: center;
    }
</style>
</head>
<body class=""> <!-- Memastikan tinggi layar penuh dengan min-h-screen -->

    <div class="w-full px-6 py-14 sm:px-8 lg:px-10 lg:py-16 mx-auto background-image"> <!-- Menyesuaikan lebar penuh dan padding -->
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-12 lg:mb-16">
            <h2 class="text-3xl font-bold md:text-5xl md:leading-tight text-gray-800 ">Tentor Kami</h2>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Temui para pengajar profesional kami</p>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 text-center"> <!-- Menyesuaikan gap dan layout -->
            <!-- Loop for displaying instructors -->
            @forelse ($instructors as $instructor)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-8 flex flex-col items-center text-center"> <!-- Increased padding -->
                    <!-- Mengubah gambar menjadi w-80 h-80 untuk memperbesar ukuran gambar -->
                    <img class="w-80 h-80 object-cover mb-6 border-4 border-gray-200 dark:border-gray-700"
                        src="{{ asset($instructor->profile_picture_url) }}"
                        alt="{{ $instructor->name }}">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $instructor->name }}</h3>
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">{{ $instructor->biodata }}</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Pengajar</p>
                    <!-- Tombol "Lihat Profil" di bawah container card -->
                    <div class="mt-auto flex gap-4"> <!-- Flexbox container with gap -->
                        <a href="{{ $instructor->cv ? Storage::url($instructor->cv) :'' }}"
                            class="inline-block px-6 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                            Lihat Profil
                        </a>
                        <a href="{{ route('frontend.instructorDetails', $instructor->id) }}"
                            class="inline-block px-6 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                            Lihat Kelas
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-600 dark:text-gray-400">Belum ada mentor yang tersedia.</p>
            @endforelse
        </div>
        <!-- End Grid -->
    </div>
</body>

    </div>






    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur Pembelajaran</title>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.24/dist/tailwind.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<section class="py-16 px-6 md:px-12 lg:px-24 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-lg shadow-lg">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold text-white mb-8">Fitur Pembelajaran Kami</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="feature-item p-6 bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out transform hover:scale-105">
                <div class="text-indigo-500 text-4xl mb-4">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Guru Berpengalaman</h3>
                <p class="text-gray-600">Guru kami memberikan pengalaman belajar yang progresif dan efektif.</p>
            </div>
            <!-- Feature 2 -->
            <div class="feature-item p-6 bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out transform hover:scale-105">
                <div class="text-indigo-500 text-4xl mb-4">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Pelatih Bersertifikat</h3>
                <p class="text-gray-600">Kurikulum kami dirancang oleh lembaga pembelajaran yang kredibel.</p>
            </div>
            <!-- Feature 3 -->
            <div class="feature-item p-6 bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out transform hover:scale-105">
                <div class="text-indigo-500 text-4xl mb-4">
                    <i class="fas fa-book-open"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Metode Pembelajaran</h3>
                <p class="text-gray-600">Kami menyediakan berbagai metode pembelajaran, dari privat hingga kelompok!</p>
            </div>
            <!-- Feature 4 -->
            <div class="feature-item p-6 bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out transform hover:scale-105">
                <div class="text-indigo-500 text-4xl mb-4">
                    <i class="fas fa-desktop"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Multipatform</h3>
                <p class="text-gray-600">Nikmati pembelajaran online di mana saja, melalui smartphone atau desktop.</p>
            </div>
        </div>
    </div>
</section>

</body>
</html>




   <!-- Benefit -->
<div class="w-full max-w-[95rem] px-4 py-10 sm:px-6 md:px-8 lg:px-20 lg:py-14 mx-auto">
    <!-- Grid Container -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-16 xl:gap-24 items-center">
        <!-- Video Column -->
        <div class="flex justify-center w-full">
            <div class="w-full max-w-[540px] aspect-video rounded-lg overflow-hidden shadow-lg">
                <iframe
                    class="w-full h-full"
                    src="https://www.youtube.com/embed/DubiRbeDpnM?si=NsEk3AhrJsLORlZw"
                    title="Innovative Elearning Video"
                    frameborder="0"
                    allowfullscreen
                ></iframe>
            </div>
        </div>

        <!-- Benefits Column -->
        <div class="w-full">
            <div class="space-y-6 md:space-y-8">
                <!-- Title Section -->
                <div class="space-y-3">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
                        Manfaat
                    </h2>
                    <p class="text-base sm:text-lg text-gray-600 dark:text-neutral-400">
                        Nikmati berbagai manfaat dan fasilitas menarik dalam komunitas belajar Innovative Elearning
                    </p>
                </div>

                <!-- Benefits List -->
                <ul class="space-y-4 sm:space-y-6">
                    @php
                        $benefits = [
                            'Tentor Ahli',
                            'Pembelajaran Mandiri',
                            'Motivasi dan Penghargaan',
                            'Akses ke Sumber Belajar yang Beragam',
                        ];
                    @endphp

                    @foreach ($benefits as $benefit)
                        <li class="flex items-center gap-4 p-2 rounded-lg transition-all duration-200 hover:shadow-md hover:translate-x-1">
                            <span class="flex-shrink-0 flex justify-center items-center w-10 h-10 rounded-full bg-blue-100 text-blue-600">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <polyline points="20 6 9 17 4 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="text-base sm:text-lg text-gray-700 dark:text-neutral-300">{{ $benefit }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- End Benefit -->


    <!-- Container utama FAQ dengan grid dan rounded border -->
    <div class="flex justify-center mx-[50px]">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-[30px] w-full max-w-full p-[30px] rounded-[30px]">
        <!-- Kolom FAQ 1 -->
        <div class="flex flex-col gap-[30px] w-full">
            <div class="flex flex-col p-5 rounded-[30px] bg-[#F5F8FA] border-t-4 border-[#3c64ff] w-full">
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
            <div class="flex flex-col p-5 rounded-[30px] bg-[#F5F8FA] border-t-4 border-[#3c64ff] w-full">
                <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-2">
                    <span class="font-semibold text-lg text-left">Apakah saya bisa mengakses kursus kapan saja?</span>
                    <div class="arrow w-9 h-9 flex shrink-0">
                        <img src="assets/icon/add.svg" alt="icon">
                    </div>
                </button>
                <div id="accordion-faq-2" class="accordion-content hide">
                    <p class="leading-[30px] text-[#475466] pt-[10px]">Ya, semua kursus yang telah Anda daftar bisa diakses kapan saja selama masih dalam periode aktif</p>
                </div>
            </div>
            <div class="flex flex-col p-5 rounded-[30px] bg-[#F5F8FA] border-t-4 border-[#3c64ff] w-full">
                <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-3">
                    <span class="font-semibold text-lg text-left">Apakah ada batas waktu untuk menyelesaikan kursus?</span>
                    <div class="arrow w-9 h-9 flex shrink-0">
                        <img src="assets/icon/add.svg" alt="icon">
                    </div>
                </button>
                <div id="accordion-faq-3" class="accordion-content hide">
                    <p class="leading-[30px] text-[#475466] pt-[10px]">Batas waktu tergantung pada jenis kursus yang diambil. Beberapa kursus memiliki akses seumur hidup, sementara lainnya memiliki batas waktu tertentu</p>
                </div>
            </div>
        </div>

        <!-- Kolom FAQ 2 -->
        <div class="flex flex-col gap-[30px] w-full">
            <div class="flex flex-col p-4 rounded-[30px] bg-[#F5F8FA] border-t-4 border-[#3c64ff] w-full">
                <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-4">
                    <span class="font-semibold text-lg text-left">Apa saja yang harus saya persiapkan sebelum mengikuti kursus?</span>
                    <div class="arrow w-9 h-9 flex shrink-0">
                        <img src="assets/icon/add.svg" alt="icon">
                    </div>
                </button>
                <div id="accordion-faq-4" class="accordion-content hide">
                    <p class="leading-[30px] text-[#475466] pt-[10px]">Gunakan laptop, PC, atau smartphone dengan spesifikasi yang cukup untuk mengakses materi tanpa kendala.</p>
                </div>
            </div>
            <div class="flex flex-col p-5 rounded-[30px] bg-[#F5F8FA] border-t-4 border-[#3c64ff] w-full">
                <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-5">
                    <span class="font-semibold text-lg text-left">Apakah saya mendapatkan sertifikat setelah menyelesaikan kursus?</span>
                    <div class="arrow w-9 h-9 flex shrink-0">
                        <img src="assets/icon/add.svg" alt="icon">
                    </div>
                </button>
                <div id="accordion-faq-5" class="accordion-content hide">
                    <p class="leading-[30px] text-[#475466] pt-[10px]">Ya, jika kursus menyediakan sertifikat, Anda bisa mengunduhnya setelah menyelesaikan semua materi dan tugas yang diwajibkan.</p>
                </div>
            </div>

            <div class="flex flex-col p-6 rounded-[30px] bg-[#F5F8FA] border-t-4 border-[#3c64ff] w-full">
                <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-6">
                    <span class="font-semibold text-lg text-left">Bagaimana cara melakukan pembayaran untuk kursus berbayar?</span>
                    <div class="arrow w-9 h-9 flex shrink-0">
                        <img src="assets/icon/add.svg" alt="icon">
                    </div>
                </button>
                <div id="accordion-faq-6" class="accordion-content hide">
                    <p class="leading-[30px] text-[#475466] pt-[10px]">Pembayaran bisa dilakukan melalui transfer bank, kartu kredit, atau dompet digital yang tersedia di platform.</p>
                </div>
            </div>
        </div>
    </div>
</div>



    


    <!-- End FAQ -->

    

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection


