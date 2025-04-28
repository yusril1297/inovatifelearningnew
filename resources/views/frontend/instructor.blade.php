@extends('layouts.front')

@section('content')


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
            <h2 class="text-3xl font-bold md:text-5xl md:leading-tight text-gray-800">Tentor Kami</h2>
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
                    <a href="{{ route('frontend.instructorDetails', $instructor->id) }}"
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





@endsection
