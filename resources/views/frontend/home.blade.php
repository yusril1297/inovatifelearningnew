@extends('layouts.front')

@section('content')
 


    <!-- Link ke Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Link ke Animate.css untuk animasi -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Optional: Custom CSS jika perlu -->
    <style>
        /* Menambahkan shadow hitam dengan opasitas pada bagian atas background */
        .bg-with-shadow {
            box-shadow: 0 -10px 20px rgba(0, 0, 0, 0.5); /* Shadow hitam dengan opasitas */
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="overflow-hidden">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-28 bg-blue-500 bg-opacity-50 bg-with-shadow mt-[0.7px]">
            <div class="flex flex-col lg:flex-row items-center lg:items-start justify-between gap-12 mx-12 opacity-0 animate__animated animate__fadeIn animate__delay-1s">
                <!-- Text Content -->
                <div class="lg:ml-12 text-center lg:text-left">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-800 dark:text-neutral-600 leading-tight mb-6">
                        Belajar Bersama
                    </h1>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-800 dark:text-neutral-600 leading-tight mb-6">
                        Mentor Berpengalaman
                    </h1>
                    <h2 class="text-3xl sm:text-3xl lg:text-4xl font-semibold text-gray-800 dark:text-neutral-600 mb-8">
                        Sudah dimanfaatkan oleh 400+ member di seluruh dunia.
                    </h2>
                    <div class="flex items-center gap-4 mt-24"> <!-- Margin atas 100px -->
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
                        alt="Gambar Belajar" class="max-w-[600px] h-auto rounded-lg"> <!-- Ukuran gambar diperbesar -->
                </div>
            </div>
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
        <!DOCTYPE html>

        <head>
    <!-- Add Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<div class="container mx-auto py-20">
    <h2 class="text-2xl font-bold text-center mb-8">Keunggulan Kami</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6"> 
        <!-- Card 1 -->
        <div class="border rounded-lg shadow-md p-6">
            <div class="flex flex-col items-center mb-4">
                <i class="fas fa-star text-5xl mb-3"></i> <!-- Rating Icon -->
                <h3 class="text-3xl font-semibold text-center mt-4">Rating</h3>
            </div>
            <div class="text-center">
                <span id="ratingCounter" class="text-5xl font-bold">0</span>
            </div>
            <p class="text-gray-600 text-xl text-center pt-6">
                Membantu siswa memilih kursus berkualitas, memberikan umpan balik cepat untuk perbaikan, menyesuaikan materi dengan preferensi pengguna, menjaga kualitas pengajaran, dan membangun komunitas belajar yang terhubung
            </p>
        </div>

        <!-- Card 2 -->
        <div class="border rounded-lg shadow-md p-6">
            <div class="flex flex-col items-center mb-4">
                <i class="fas fa-smile-beam text-5xl mb-3"></i> <!-- Satisfaction Icon -->
                <h3 class="text-3xl font-semibold text-center mt-4">Kepuasan</h3>
            </div>
            <div class="text-center">
                <span id="satisfactionCounter" class="text-5xl font-bold">0</span>
            </div>
            <p class="text-gray-600 text-xl text-center pt-6">
                Kami juga menjaga kualitas pengajaran dengan menghadirkan pengajaran yang profesional dan berbobot, serta membangun komunitas belajar yang terhubung, di mana siswa dapat saling mendukung dan berkembang bersama.
            </p>
        </div>
        
        <!-- Card 3 -->
        <div class="border rounded-lg shadow-md p-6">
            <div class="flex flex-col items-center mb-4">
                <i class="fas fa-wallet text-5xl mb-3"></i> <!-- Finance Icon -->
                <h3 class="text-3xl font-semibold text-center mt-4">Finance</h3>
            </div>
            <div class="text-center">
                <span id="financeCounter" class="text-5xl font-bold">0</span>
            </div>
            <p class="text-gray-600 text-xl text-center pt-6">
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
            <div class="course-card w-1/3 px-3 pb-[70px] mt-[2px]">
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
<div class="container px-[20px] max-w-full py-10 mr-[20px]">
    <!-- Menambahkan teks "Dokumentasi Mengajar" di atas konten -->
    <h1 class="text-4xl font-bold text-center mb-8">Dokumentasi Mengajar</h1>

    <div class="flex justify-center w-full">
        <div class="flex justify-center gap-6 max-w-screen-3xl w-full px-[100px]">
            <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform hover:scale-105 transition-all w-1/4">
                <img src="https://gurulesku.id/wp-content/uploads/2020/01/Lowongan-Tentor-Les-Privat.jpg" alt="Karya 1" class="w-full">
                <div class="p-4 text-center">
                    <p class="text-sm text-gray-600 font-bold">Kegiatan Mengajar</p>
                    <p class="text-xs text-gray-500">Ini adalah karya yang dibuat sekitar tujuh minggu lalu, dengan hasil percetakan 3D yang sangat detail dan cermat, menghasilkan desain yang unik dan fungsional.</p>
                </div>
            </div>
            <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform hover:scale-105 transition-all w-1/4">
                <img src="https://assets.kompasiana.com/items/album/2023/01/07/les-privat-ke-rumah-63b96aba08a8b541570edde2.jpg" alt="Karya 2" class="w-full">
                <div class="p-4 text-center">
                    <p class="text-sm text-gray-600 font-bold">Kegiatan Mengajar</p>
                    <p class="text-xs text-gray-500">Proyek ini selesai sekitar tujuh minggu yang lalu, memanfaatkan teknologi pencetakan 3D untuk membuat laci dengan desain yang modern dan sangat praktis.</p>
                </div>
            </div>
            <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform hover:scale-105 transition-all w-1/4">
                <img src="https://fomu.co.id/wp-content/uploads/2023/10/slider-1.jpg" alt="Karya 3" class="w-full">
                <div class="p-4 text-center">
                    <p class="text-sm text-gray-600 font-bold">Kegiatan Mengajar</p>
                    <p class="text-xs text-gray-500">Karya ini selesai tercipta sekitar tujuh minggu lalu, menggabungkan seni dan teknologi untuk menghasilkan produk laci yang estetis sekaligus fungsional dengan teknologi pencetakan 3D.</p>
                </div>
            </div>
            <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform hover:scale-105 transition-all w-1/4">
                <img src="https://fomu.co.id/wp-content/uploads/2023/10/slider-1.jpg" alt="Karya 4" class="w-full">
                <div class="p-4 text-center">
                    <p class="text-sm text-gray-600 font-bold">Kegiatan Mengajar</p>
                    <p class="text-xs text-gray-500">Karya ini selesai tercipta sekitar tujuh minggu lalu, menggabungkan seni dan teknologi untuk menghasilkan produk laci yang estetis sekaligus fungsional dengan teknologi pencetakan 3D.</p>
                </div>
            </div>
        </div>
    </div>
</div>



</div>
    

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

    <div class="max-w-[90rem] px-6 py-14 sm:px-8 lg:px-10 lg:py-16 mx-auto background-image"> <!-- Increased max-width and padding -->
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-12 lg:mb-16">
            <h2 class="text-3xl font-bold md:text-5xl md:leading-tight text-gray-800 dark:text-white">Tentor Kami</h2>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Temui para pengajar profesional kami</p>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-16"> <!-- Increased gap and layout -->
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






 <!-- Why SocioEdu --> 
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur Pembelajaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <style> 
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .features {
            width: calc(100% - 100px); /* Mengurangi 50px dari kiri dan kanan */
            margin: 50px auto; /* Memberikan margin luar 50px di kiri dan kanan */
            padding: 50px 20px;
            display: flex;
            justify-content: space-between;  
            flex-wrap: wrap;  /* Menyesuaikan elemen untuk responsif */
            gap: 20px;  /* Jarak antar elemen */
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            border-radius: 15px;
            flex: 1;
            max-width: calc(33.33% - 20px);  /* Membatasi lebar elemen menjadi sepertiga */
        }

        .icon i {
            font-size: 2.5rem;  /* Membesarkan ukuran ikon */
            color: rgb(16, 1, 225);
        }

        .text h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .text p {
            font-size: 1rem;
            color: #666;
            line-height: 1.5;  
        }

        @media (max-width: 768px) {
            .feature-item {
                max-width: calc(50% - 20px);  
            }
        }

        @media (max-width: 480px) {
            .feature-item {
                max-width: 100%;  
            }
        }
    </style>
</head>
<body>

<section class="features">
    <div class="feature-item">
        <div class="icon">
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <div class="text">
            <h3>Guru Berpengalaman</h3>
            <p>Guru kami memberikan pengalaman belajar yang progresif dan efektif.</p>
        </div>
    </div>

    <div class="feature-item">
        <div class="icon">
            <i class="fas fa-certificate"></i>
        </div>
        <div class="text">
            <h3>Pelatih Bersertifikat</h3>
            <p>Kuriculum kami dirancang oleh lembaga pembelajaran yang kredibel.</p>
        </div>
    </div>

    <div class="feature-item">
        <div class="icon">
            <i class="fas fa-book-open"></i>
        </div>
        <div class="text">
            <h3>Metode Pembelajaran</h3>
            <p>Kami menyediakan berbagai metode pembelajaran, dari privat hingga kelompok!</p>
        </div>
    </div>

    <div class="feature-item">
        <div class="icon">
            <i class="fas fa-desktop"></i>
        </div>
        <div class="text">
            <h3>Multipatform</h3>
            <p>Nikmati pembelajaran online di mana saja, melalui smartphone atau desktop.</p>
        </div>
    </div>
</section>

</body>
</html>
<!-- End Why SocioEdu -->



   <!-- Benefit -->
<div class="max-w-[95rem] px-12 py-10 sm:px-16 lg:px-20 lg:py-14 mx-auto flex flex-col items-center">
    <!-- Grid -->
    <div class="grid md:grid-cols-2 items-center gap-16 xl:gap-40 text-center md:text-left">
    <div class="flex justify-center">
    <iframe class="w-[740px] h-[330px]" 
        src="https://www.youtube.com/embed/3ofWUw3wc0Y?si=mDVExWTybrjcRoVF" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen>
    </iframe>
</div>

        
       <!-- Text Content -->
<div class="w-full max-w-lg ml-auto text-right">
    <div class="space-y-6 sm:space-y-8">
        <!-- Title -->
        <div class="space-y-2 md:space-y-4">
            <h2 class="font-bold text-4xl lg:text-5xl text-gray-800 dark:text-neutral-500">
                Manfaat
            </h2>
            <p class="text-lg text-gray-500 dark:text-neutral-500">
                Nikmati berbagai manfaat dan fasilitas menarik dalam komunitas belajar Innovative Elearning
            </p>
        </div>
        <!-- End Title -->

        <!-- List -->
        <ul class="space-y-4 sm:space-y-5">
            <li class="flex flex-row-reverse gap-x-4 items-center">
                <span class="size-6 flex justify-center items-center rounded-full bg-blue-100 text-blue-600">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                </span>
                <span class="text-base sm:text-lg text-gray-600 dark:text-neutral-500">
                    Tentor Ahli
                </span>
            </li>
            <li class="flex flex-row-reverse gap-x-4 items-center">
                <span class="size-6 flex justify-center items-center rounded-full bg-blue-100 text-blue-600">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                </span>
                <span class="text-base sm:text-lg text-gray-600 dark:text-neutral-500">
                    Pembelajaran Mandiri
                </span>
            </li>
            <li class="flex flex-row-reverse gap-x-4 items-center">
                <span class="size-6 flex justify-center items-center rounded-full bg-blue-100 text-blue-600">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                </span>
                <span class="text-base sm:text-lg text-gray-600 dark:text-neutral-500">
                Motivasi dan Penghargaan
                </span>
            </li>
            
            <li class="flex flex-row-reverse gap-x-4 items-center">
                <span class="size-6 flex justify-center items-center rounded-full bg-blue-100 text-blue-600">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                </span>
                <span class="text-base sm:text-lg text-gray-600 dark:text-neutral-500">
                Akses ke Sumber Belajar yang Beragam
                </span>
            </li>
        </ul>
        <!-- End List -->
    </div>
</div>
</div>
<!-- End Grid -->
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


