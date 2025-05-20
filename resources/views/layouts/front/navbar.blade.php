<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <!-- Include Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 shadow-sm" x-data="{ open: false, navOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('frontend.home') }}" class="flex-shrink-0">
                        <span class="sr-only">Your Company</span>
                        <img class="h-20 w-auto" src="{{ asset($settings->path_logo ?? 'default-logo.png') }}" alt="Logo">
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex md:items-center md:space-x-8">
                    <a href="{{ route('frontend.home') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 font-medium">Home</a>
                    <a href="{{ route('frontend.allCourses') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 font-medium">Semua Kursus</a>
                    <a href="{{ route('frontend.about') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 font-medium">Tentang Kami</a>
                    
                    <!-- Category Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" type="button" class="text-gray-700 group inline-flex items-center px-3 py-2 font-medium hover:text-blue-600" aria-expanded="false">
                            Category
                            <svg class="ml-2 h-5 w-5 text-gray-700 group-hover:text-blue-600 transition-transform duration-200" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1" class="absolute left-1/2 z-10 mt-3 w-screen max-w-md -translate-x-1/2 transform px-2 sm:px-0">
                            <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                    @foreach ($categories as $category)
                                    <a href="{{ route('frontend.categories', $category->slug) }}" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
                                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-blue-500 text-white">
                                            <img src="{{ Storage::url($category->icon) }}" class="w-6 h-6">
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-900">{{ $category->name }}</p>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('frontend.instructor') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 font-medium">Instructor</a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button @click="navOpen = !navOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-blue-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg x-show="!navOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="navOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Login/Profile Button -->
                <div class="hidden md:flex md:items-center">
                    @guest
                        <a href="{{ route('login') }}" class="ml-8 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700">
                            Log in
                        </a>
                    @else
                        <div class="ml-3 relative" x-data="{ profileOpen: false }">
                            <div>
                                <button @click="profileOpen = !profileOpen" type="button" class="flex items-center max-w-xs text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="mr-2 font-medium text-gray-700">{{ Auth::user()->name }}</span>
                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_picture_url }}" alt="Profile Picture">
                                </button>
                            </div>
                            <div x-show="profileOpen" @click.away="profileOpen = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                @if (Auth::user()->role == 0)
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Dashboard</a>
                                @elseif(Auth::user()->role == 1)
                                    <a href="{{ route('instructor.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Dashboard</a>
                                @else
                                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">My Courses</a>
                                @endif
                                <a href="{{ route('profile.edit.information') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">My Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Log Out</button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state -->
        <div x-show="navOpen" class="md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('frontend.home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Home</a>
                <a href="{{ route('frontend.allCourses') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Semua Kursus</a>
                <a href="{{ route('frontend.about') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Tentang Kami</a>
                
                <!-- Mobile Category Dropdown -->
                <div x-data="{ categoryOpen: false }">
                    <button @click="categoryOpen = !categoryOpen" class="w-full flex justify-between items-center px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                        <span>Category</span>
                        <svg class="h-5 w-5 text-gray-700" :class="{'rotate-180': categoryOpen}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="categoryOpen" class="mt-2 space-y-2 px-4">
                        @foreach ($categories as $category)
                        <a href="{{ route('frontend.categories', $category->slug) }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-blue-600 hover:bg-gray-50 hover:border-blue-500">
                            {{ $category->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
                
                <a href="{{ route('frontend.instructor') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Instructor</a>
                
                @guest
                    <div class="pt-4 pb-3 border-t border-gray-200">
                        <a href="{{ route('login') }}" class="block w-full text-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700">
                            Log in
                        </a>
                    </div>
                @else
                    <div class="pt-4 pb-3 border-t border-gray-200">
                        <div class="flex items-center px-5">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_picture_url }}" alt="Profile Picture">
                            </div>
                            <div class="ml-3">
                                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                            </div>
                        </div>
                        <div class="mt-3 space-y-1 px-2 relative z-50">
                            @if (Auth::user()->role == 0)
                                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Dashboard</a>
                            @elseif(Auth::user()->role == 1)
                                <a href="{{ route('instructor.dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Dashboard</a>
                            @else
                                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">My Courses</a>
                            @endif
                            <a href="{{ route('profile.edit.information') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">My Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Log Out</button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Include AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>