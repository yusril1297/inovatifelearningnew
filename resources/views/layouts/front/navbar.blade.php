<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <!-- Include Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS Styling -->
    <style>
        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: 100px;
        }

        .logo-img {
    height: 100px; /* atau 60px */
    width: 60px;
}


        /* Center Menu */
        .navbar .menu {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            flex-grow: 1;
        }

        @media (max-width: 767px) {
        .navbar .menu {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 60px;
            left: 0;
            right: 0;
            background: white;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 100;
        }
        
        .navbar .menu.open {
            display: flex;
        }
    }


        @media (min-width: 768px) {
        .navbar .menu {
            display: flex;  /* Tampil di ukuran layar medium dan lebih besar */
        }
}

        /* Menu item styling */
        .navbar .menu a,
        .navbar .menu button {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            color: #333;
            padding: 10px 20px;
            cursor: pointer;
            transition: color 0.3s;
        }

        /* Button hover effect */
        .navbar .menu a:hover,
        .navbar .menu button:hover {
            color: #007bff;
        }

        /* Button Category Dropdown */
        .navbar .menu .relative {
            position: relative;
        }

        .navbar .menu button {
            display: flex;
            gap: 5px;
            align-items: center;
            background: none;
            border: none;
            color: #333;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s;
        }

        .navbar .menu button:hover {
            color: #007bff;
        }

        .navbar .menu button svg {
            transition: transform 0.3s ease;
        }

        .navbar .menu button[aria-expanded="true"] svg {
            transform: rotate(180deg);
        }

        /* Dropdown Menu */
        .navbar .menu .absolute {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 10;
            display: none;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 5px;
        }

        .navbar .menu .absolute a {
            padding: 10px 15px;
            display: block;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .navbar .menu .absolute a:hover {
            background-color: #f1f1f1;
        }

        /* Show dropdown when active */
        .navbar .menu .relative.open .absolute {
            display: block;
        }

        /* Mobile Navbar (Responsive) */
        @media (max-width: 768px) {
            .navbar .menu {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .navbar .logo {
                position: absolute;
                left: 10px;
            }
        }

        /* Login Button Styling */
        .navbar .login {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-right: 100px; /* Margin Right 100px */
        }

        .navbar .login a {
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .navbar .login a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <!-- Tombol Hamburger untuk Mobile -->


    <div class="navbar"  x-data="{ open: false, navOpen:false }">
        <div class="flex lg:flex-1" style="margin-left: 100px;">
            <a href="{{ route('frontend.home') }}" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-20 w-30" src="{{ asset($settings->path_logo ?? 'default-logo.png') }}" alt="">

            </a>
        </div>

        <div class="flex md:hidden">
            <button @click="navOpen = !navOpen" class="text-gray-700 focus:outline-none">
                <!-- Tampilkan ikon X saat navOpen true, dan hamburger saat false -->
                <i class="bi" :class="navOpen ? 'bi-x' : 'bi-list'" style="font-size: 2rem;"></i>
            </button>
        </div>
        <div class="menu" :class="{ 'open': navOpen }">
            <a href="{{ route('frontend.home') }}">Home</a>
            <a href="{{ route('frontend.allCourses') }}">Semua Kursus</a>
            <a href="{{ route('frontend.about') }}">Tentang Kami</a>
            <div class="relative" :class="{ 'open': open }">
                <button @click="open = !open" type="button" aria-expanded="false">
                    Category
                    <svg class="h-5 w-5 flex-none text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false" class="absolute -left-8 top-full z-10 mt-3 w-screen max-w-md overflow-hidden rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5">
                    <div class="p-4">
                        <!-- Course Links -->
                        @foreach ($categories as $category)
                            <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <img src="{{ Storage::url($category->icon) }}" class="w-7 h-7">
                                </div>
                                <div class="flex-auto">
                                    <a href="{{ route('frontend.categories', $category->slug) }}" class="block font-semibold text-gray-900 hover:text-blue-500">
                                        {{ $category->name }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="{{ route('frontend.instructor') }}">Instructor</a>
            
           
        </div>
        <div class="login">
            @guest
                <!-- Show Login button if not logged in -->
                <a href="{{ route('login') }}">Log in</a>
            @else
                <!-- Profile Dropdown Trigger with Name and Picture -->
                <div class="relative justify-end">
                    <button type="button" class="flex items-center space-x-3 text-sm font-semibold leading-6 text-gray-700 focus:outline-none" onclick="toggleDropdown()">
                        <span class="mr-2">{{ Auth::user()->name }}</span>
                        <img src="{{ Auth::user()->profile_picture_url }}" alt="Profile Picture" class="w-10 h-10 rounded-full">
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="profileDropdown" class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden z-50">
                        @if (Auth::user()->role == 0)
                            <!-- Admin -->
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                        @elseif(Auth::user()->role == 1)
                            <!-- Instructor -->
                            <a href="{{ route('instructor.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                        @else
                            <!-- Student -->
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Courses</a>
                        @endif
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Profile</a>
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </div>

    <!-- Include AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('hidden');
        }
    </script>
</body>

</html>
