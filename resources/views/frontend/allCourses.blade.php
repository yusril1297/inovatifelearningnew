@extends('layouts.front')

@section('content')
    <div class="font-[sans-serif] bg-gray-100">
        <div class="lg:p-12 mx-auto lg:max-w-full sm:max-w-full">
            <script>
                function updatePrice() {
                    const price = document.getElementById('price').value * 100000; // Mengalikan dengan 100.000 untuk harga mulai dari Rp 100.000
                    document.getElementById('priceDisplay').textContent = price.toLocaleString(); // Memformat angka menjadi ribuan
                }

                document.addEventListener('DOMContentLoaded', () => {
                    updatePrice();
                });
            </script>
            
            <!-- Main Content: Product Listing -->
            <div class="flex-1 p-12 justify-center lg:max-w-full sm:max-w-full">
                <h2 class="flex items-center justify-center text-3xl font-extrabold mb-6 text-gray-800 dark:text-neutral-500">
                    Semua Kursus
                </h2>
                <h3 class="flex items-center justify-center text-2xl mb-4">
                    Dapatkan pengetahuan dari mentor berpengalaman dengan biaya yang terjangkau.
                </h3>

                <!-- Search Bar -->
                <div class="flex justify-center mb-11">
                    <form action="{{ route('frontend.allCourses') }}" method="GET" class="flex items-center border border-gray-300 rounded-full w-full max-w-[500px] px-4 py-2 bg-white shadow-md">
                        <div class="relative w-full">
                            <input type="text" name="search" placeholder="Cari Kursus..." class="w-full p-3 pl-4 pr-10 rounded-full text-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-search absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 text-lg"></i>
                        </div>
                        <button type="submit" class="ml-2 px-5 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition duration-200">
                            Cari
                        </button>
                    </form>
                </div>

             <div class="flex flex-col lg:flex-row">
                   <!-- Sidebar: Category & Filter -->
            <div class="w-full lg:w-1/4 pr-8 mt-12 lg:mt-[200px]">
                <form action="{{ route('frontend.allCourses') }}" method="GET" class="space-y-6">
                    <!-- Category Dropdown -->
                    <div>
                        <label class="block text-lg mb-2" id="category">Kategori</label>
                        <select id="category" name="category" class="w-full p-2 mb-4 border rounded-md">
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') ==$category->id ? 'selected':'' }}>{{ $category->name }}</option>
                            @empty
                                <option value="">Belum ada data Category</option>
                            @endforelse
                        </select>
                    </div>

                    <!-- Level Dropdown -->
                    <div>
                        <label for="rating" class="block text-lg mb-2">Level</label>
                        <select id="level" name="level" class="w-full p-2 mb-4 border rounded-md">
                            @forelse ($levels as $level)
                                <option value="{{ $level->id }}" {{ request('level') ==$level->id ? 'selected':'' }}>{{ $level->name }}</option>
                            @empty
                                <option value="">Belum ada data level</option>
                            @endforelse
                        </select>
                    </div>

                    <!-- Price Range Filter -->
                    <div>
                        <label for="price">Harga: Rp <span id="priceDisplay">0</span></label>
                        <input type="range" id="price" name="price" min="1" max="10" step="1" class="w-full mb-4" oninput="updatePrice()" value="{{ request('price', 1) }}" />
                    </div>

                    <!-- Apply Filter Button -->
                    <button type="submit" class="w-full py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Terapkan Filter</button>
                </form>
            </div>


                <!-- Course List -->
<section id="Top-Categories" class="max-w-[1800px] lg:w-4/4 mx-auto flex flex-col py-[30px] px-[-50px] gap-[30px]">
    <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-[40px] w-full">
        @foreach ($courses as $course)
            <div class="course-card">
                <div class="flex flex-col rounded-t-[20px] rounded-b-[40px] gap-[50px] bg-white w-full pb-[30px] overflow-hidden ring-1 ring-[#DADEE4] transition-all duration-300 hover:ring-2 hover:ring-[#adc7fe]">
                    <a href="{{ route('frontend.details', $course->slug) }}" class="thumbnail w-full h-[450px] shrink-0 rounded-[20px] overflow-hidden">
                        @if ($course->youtube_thumbnail_url)
                            <iframe width="100%" height="100%" src="{{ $course->youtube_thumbnail_url }}?autoplay=0&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @endif
                    </a>
                    <div class="flex flex-col px-8 gap-[50px]">
                        <div class="flex flex-col gap-[30px]">
                            <a href="{{ route('frontend.details', $course->slug) }}" class="font-semibold text-4xl line-clamp-2 hover:line-clamp-none min-h-[100px]">{{ $course->title }}</a>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-[6px]">
                                    @for ($i = 0; $i < 5; $i++)
                                        <div>
                                            <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                        </div>
                                    @endfor
                                </div>
                                <p class="text-right text-[#6D7786] text-xl">{{ $course->enrollments->count() }} students</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            @auth
                                @if ($enrollments->contains('course_id', $course->id))
                                    <p class="font-bold text-3xl text-green-600">Joined</p>
                                @else
                                    <p class="font-bold text-3xl text-[#1F2937]">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                                @endif
                            @else
                                <p class="font-bold text-3xl text-[#1F2937]">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                            @endauth
                        </div>
                        <div class="flex items-center gap-6">
                            <div class="w-16 h-16 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('storage/' . $course->instructor->avatar) }}" class="w-full h-full object-cover" alt="icon">
                            </div>
                            <div class="flex flex-col">
                                <p class="font-semibold text-3xl">{{ $course->instructor->name }}</p>
                                <p class="text-[#6D7786] text-xl">{{ $course->category->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
             </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
