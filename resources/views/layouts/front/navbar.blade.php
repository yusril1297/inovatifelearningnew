<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Shadow</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    <script>
        function openNav() {
            document.getElementById('mobileMenu').classList.remove('hidden');
        }
        function closeNav() {
            document.getElementById('mobileMenu').classList.add('hidden');
        }
        function toggleDropdown() {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('hidden');
        }
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('profileDropdown');
            const isDropdownButton = event.target.closest('button[onclick="toggleDropdown()"]');
            if (!isDropdownButton && !dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="bg-white shadow-md">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="{{ route('frontend.home') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="{{ asset($settings->path_logo ?? 'default-logo.png') }}" alt="">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button onclick="openNav()" type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <a href="{{ route('frontend.about') }}"
                class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500 ml-4">Tentang Kami</a>
            <div class="hidden lg:flex lg:gap-x-16 z-20 ml-4" x-data="{ open: false }">
                <a href="{{ route('frontend.allCourses') }}"
                    class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500">Semua Kelas</a>
                <div class="relative">
                    <button @click="open = ! open" type="button"
                        class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500"
                        aria-expanded="false">
                        Kelas
                        <svg class="h-5 w-5 flex-none text-gray-900" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false"
                        class="absolute -left-8 top-full z-10 mt-3 w-screen max-w-md overflow-hidden rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5">
                        <div class="p-4">
                            @foreach ($categories as $category)
                                <div
                                    class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                    <div
                                        class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                        <img src="{{ Storage::url($category->icon) }}" class="w-7 h-7">
                                    </div>
                                    <div class="flex-auto">
                                        <a href="{{ route('frontend.categories', $category->slug) }}"
                                            class="block font-semibold text-gray-900 hover:text-blue-500">
                                            {{ $category->name }}
                                            <span span class="absolute inset-0"></span></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <a href="{{ route('frontend.instructor') }}"
                    class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500">Instructor</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}"
                        class="py-1.5 px-3 text-sm font-semibold leading-6 rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                        Log in <span aria-hidden="true">&rarr;</span>
                    </a>
                @else
                    <div class="relative">
                        <button type="button"
                            class="flex items-center space-x-3 text-sm font-semibold leading-6 text-gray-700"
                            onclick="toggleDropdown()">
                            <span class="mr-2">{{ Auth::user()->name }}</span>
                            <img src="{{ Auth::user()->profile_picture_url }}" alt="Profile Picture"
                                class="w-10 h-10 rounded-full">
                        </button>
                        <div id="profileDropdown"
                            class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                            @if (Auth::user()->role == 0)
                                <a href="{{ route('admin.dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                            @elseif(Auth::user()->role == 1)
                                <a href="{{ route('instructor.dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                            @else
                                <a href="{{ route('dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Courses</a>
                            @endif
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Profile</a>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </nav>
    </header>
</body>

</html>
