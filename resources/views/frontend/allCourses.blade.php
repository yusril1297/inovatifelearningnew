@extends('layouts.front')

@section('content')
    <div class="font-[sans-serif] bg-gray-100">
        <div class="p-12 mx-auto lg:max-w-[1800px] sm:max-w-full flex">
           <!-- Sidebar: Category & Filter -->
<div class="w-1/4 pr-8 mt-[200px]">
    <h3 class="text-2xl font-semibold mb-4">Categori</h3>
    <ul class="space-y-3">
        <li><a href="#" class="text-lg hover:text-blue-500">UI/UX</a></li>
        <li><a href="#" class="text-lg hover:text-blue-500">Desain</a></li>
        <li><a href="#" class="text-lg hover:text-blue-500">Photografi</a></li>
        <li><a href="#" class="text-lg hover:text-blue-500">Animasi</a></li>
        <li><a href="#" class="text-lg hover:text-blue-500">Menggambar</a></li>
    </ul>

    <!-- Filter Section -->
    <div class="mt-8">
        <h3 class="text-2xl font-semibold mb-4">Filter</h3>
        <form action="#" method="GET">
        <label for="price">Harga: Rp <span id="priceDisplay">0</span></label>
<input type="range" id="price" name="price" min="1" max="10" step="1" class="w-full mb-4" oninput="updatePrice()">

<script>
    function updatePrice() {
        const price = document.getElementById('price').value * 100000; // Mengalikan dengan 100.000 untuk harga mulai dari Rp 100.000
        document.getElementById('priceDisplay').textContent = price.toLocaleString(); // Memformat angka menjadi ribuan
    }
</script>


            <label for="rating" class="block text-lg mb-2">Level</label>
            <select id="rating" name="rating" class="w-full p-2 mb-4 border rounded-md">
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
            </select>

            <button type="submit" class="w-full py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Terapkan Filter</button>
        </form>
    </div>
</div>


            <!-- Main Content: Product Listing -->
            <div class="flex-1 p-12 ml-4 lg:max-w-[1300px] sm:max-w-full">
                <h2 class="flex items-center justify-center text-3xl font-extrabold mb-6 text-gray-800 dark:text-neutral-500">
                    Semua Kursus
                </h2>
                <h3 class="flex items-center justify-center text-2xl mb-4">
                    Dapatkan pengetahuan dari mentor berpengalaman dengan biaya yang terjangkau.
                </h3>

                <!-- Search Bar -->
                <div class="mb-8 flex justify-end">
                    <form action="#" method="GET" class="flex items-center border border-gray-200 rounded-full w-full max-w-[500px] relative">
                        <input type="text" name="query" placeholder="Cari Kursus..." class="w-full p-3 rounded-full text-lg pr-10" />
                        <i class="fas fa-search absolute right-3 text-gray-500 text-xl"></i>
                    </form>
                </div>

                <!-- Course List -->
                <section id="Top-Categories" class="max-w-[1800px] mx-auto flex flex-col py-[30px] px-[-50px] gap-[-80px]">
                    <div class="grid grid-cols-3 gap-[30px] w-full">
                        @foreach ($courses as $course)
                            <div class="course-card">
                                <div class="flex flex-col rounded-t-[20px] rounded-b-[40px] gap-[50px] bg-white w-full pb-[30px] overflow-hidden ring-1 ring-[#DADEE4] transition-all duration-300 hover:ring-2 hover:ring-[#adc7fe]">
                                    <a href="{{ route('frontend.details', $course->slug) }}" class="thumbnail w-full h-[400px] shrink-0 rounded-[20px] overflow-hidden">
                                        @if ($course->youtube_thumbnail_url)
                                            <iframe width="100%" height="100%" src="{{ $course->youtube_thumbnail_url }}?autoplay=0&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        @endif
                                    </a>
                                    <div class="flex flex-col px-8 gap-[50px]">
                                        <div class="flex flex-col gap-[30px]">
                                            <a href="{{ route('frontend.details', $course->slug) }}" class="font-semibold text-3xl line-clamp-2 hover:line-clamp-none min-h-[80px]">{{ $course->title }}</a>
                                            <div class="flex justify-between items-center">
                                                <div class="flex items-center gap-[6px]">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <div>
                                                            <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                                        </div>
                                                    @endfor
                                                </div>
                                                <p class="text-right text-[#6D7786] text-lg">{{ $course->enrollments->count() }} students</p>
                                            </div>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            @auth
                                                @if ($enrollments->contains('course_id', $course->id))
                                                    <p class="font-bold text-2xl text-green-600">Joined</p>
                                                @else
                                                    <p class="font-bold text-2xl text-[#1F2937]">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                                                @endif
                                            @else
                                                <p class="font-bold text-2xl text-[#1F2937]">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                                            @endauth
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden">
                                                <img src="{{ asset('storage/' . $course->instructor->avatar) }}" class="w-full h-full object-cover" alt="icon">
                                            </div>
                                            <div class="flex flex-col">
                                                <p class="font-semibold text-2xl">{{ $course->instructor->name }}</p>
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

    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
