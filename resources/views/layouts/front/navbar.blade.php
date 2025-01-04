<header class="bg-white">
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
    </div>
    <a href="{{ route('frontend.instructor') }}"
        class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500 ml-4">Tentang Kami</a>
</div>
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
                        <!-- Course Links -->
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
                <!-- Show Login button if not logged in -->
                <a href="{{ route('login') }}"
                    class="py-1.5 px-3 text-sm font-semibold leading-6 rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Log in <span aria-hidden="true">&rarr;</span>
                </a>
            @else
                <!-- Profile Dropdown Trigger with Name and Picture -->
                <div class="relative">
                    <button type="button"
                        class="flex items-center space-x-3 text-sm font-semibold leading-6 text-gray-700 focus:outline-none"
                        onclick="toggleDropdown()">
                        <span class="mr-2">{{ Auth::user()->name }}</span> <!-- User's Name -->
                        <img src="{{ Auth::user()->profile_picture_url }}" alt="Profile Picture"
                            class="w-10 h-10 rounded-full">
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="profileDropdown"
                        class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                        @if (Auth::user()->role == 0)
                            <!-- Admin -->
                            <a href="{{ route('admin.dashboard') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                        @elseif(Auth::user()->role == 1)
                            <!-- Instructor -->
                            <a href="{{ route('instructor.dashboard') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                        @else
                            <!-- Student -->
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

        <script>
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

    </nav>

    <!-- Mobile menu, show/hide based on menu open state. -->
    <div id="mobileMenu" class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div
            class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                        alt="">
                </a>
                <button onclick="closeNav()" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root" x-data="{ open: false }">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href=""
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 hover:text-blue-500">All
                            Courses</a>
                        <div class="-mx-3">
                            <button @click="open = ! open" type="button"
                                class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 hover:text-blue-500"
                                aria-controls="disclosure-1" aria-expanded="false">
                                Courses
                                <svg class="h-5 w-5 flex-none4l55" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" class="mt-2 space-y-2" id="disclosure-1">
                                @foreach ($categories as $category)
                                    <a href=""
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50 hover:text-blue-500">{{ $category->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <a href=""
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 hover:text-blue-500">Instructor</a>
                    </div>
                    <div class="py-6">
                        <a href="{{ route('login') }}"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 hover:text-blue-500">Log
                            in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
