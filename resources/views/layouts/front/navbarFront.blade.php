<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SocioEdu</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
</head>

<body>
    <header class="bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                        alt="">
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
            <div class="hidden lg:flex lg:gap-x-12 z-20" x-data="{ open: false }">
                <a href=""
                    class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500">All Courses</a>
                <div class="relative">
                    <button @click="open = ! open" type="button"
                        class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500"
                        aria-expanded="false">
                        Courses
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
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <ion-icon class="w-7 h-7" name="logo-html5"></ion-icon>
                                </div>
                                <div class="flex-auto">
                                    <a href=""
                                        class="block font-semibold text-gray-900 hover:text-blue-500">HTML
                                        & CSS<span class="absolute inset-0"></span></a>
                                </div>
                            </div>
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <ion-icon class="w-7 h-7" name="logo-laravel"></ion-icon>
                                </div>
                                <div class="flex-auto">
                                    <a href=""
                                        class="block font-semibold text-gray-900 hover:text-blue-500">Laravel<span
                                            class="absolute inset-0"></span></a>
                                </div>
                            </div>
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <ion-icon class="w-7 h-7" name="logo-python"></ion-icon>
                                </div>
                                <div class="flex-auto">
                                    <a href=""
                                        class="block font-semibold text-gray-900 hover:text-blue-500">Python<span
                                            class="absolute inset-0"></span></a>
                                </div>
                            </div>
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <ion-icon class="w-7 h-7" name="logo-react"></ion-icon>
                                </div>
                                <div class="flex-auto">
                                    <a href=""
                                        class="block font-semibold text-gray-900 hover:text-blue-500">React JS<span
                                            class="absolute inset-0"></span></a>
                                </div>
                            </div>
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg"
                                        enable-background="new 0 0 24 24" viewBox="0 0 24 24" id="flutter">
                                        <polygon
                                            points="14.329 11.072 14.328 11.073 7.857 17.53 14.327 24 21.7 24 15.24 17.531 21.7 11.072">
                                        </polygon>
                                        <polygon points="6 15.7 21.684 .012 14.327 .012 14.314 0 2.3 12"></polygon>
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href=""
                                        class="block font-semibold text-gray-900 hover:text-blue-500">Flutter<span
                                            class="absolute inset-0"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="" class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500">Instructor</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="{{ route('login') }}"
                    class="py-1.5 px-3 text-sm font-semibold leading-6 rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Log
                    in <span aria-hidden="true">&rarr;</span></a>
            </div>
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
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
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
                                <div x-show="open" @click.away="open = false" class="mt-2 space-y-2"
                                    id="disclosure-1">
                                    <a href=""
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50 hover:text-blue-500">HTML
                                        & CSS</a>
                                    <a href=""
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50 hover:text-blue-500">Laravel</a>
                                    <a href=""
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50 hover:text-blue-500">Python</a>
                                    <a href=""
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50 hover:text-blue-500">React
                                        JS</a>
                                    <a href=""
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50 hover:text-blue-500">Flutter</a>
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

    <script>
        document.getElementById("mobileMenu").style.display = "none";

        function checkResolution() {
            const mobileMenu = document.getElementById("mobileMenu");

            if (window.innerWidth < 768) {
                document.getElementById("mobileMenu").style.display = "none";
            } else {
                document.getElementById("mobileMenu").style.display = "none";
            }
        }

        checkResolution();

        function openNav() {
            document.getElementById("mobileMenu").style.display = "block";
        }

        window.onresize = checkResolution;

        function closeNav() {
            document.getElementById("mobileMenu").style.display = "none";
        }
        window.onresize = checkResolution;
    </script>





    @yield('content')
</body>

{{-- footer --}}

<footer
    class="mx-auto flex flex-col pt-[70px] pb-[50px] px-[100px] gap-[50px] bg-gray-900 w-full dark:bg-neutral-950]">
    <div class="flex justify-between">
        <div class="flex flex-col gap-5">
            <p class="font-bold text-2xl text-white">SocioEdu</p>
        </div>
        <div class="flex flex-col gap-5">
            <p class="font-semibold text-lg text-white">Courses</p>
            <ul class="flex flex-col gap-[14px]">
                <li>
                    <a href="" class="text-white hover:text-blue-500">HTML & CSS</a>
                </li>
                <li>
                    <a href="" class="text-white hover:text-blue-500">Laravel</a>
                </li>
                <li>
                    <a href="" class="text-white hover:text-blue-500">Python</a>
                </li>
                <li>
                    <a href="" class="text-white hover:text-blue-500">React Js</a>
                </li>
                <li>
                    <a href="" class="text-white hover:text-blue-500">Flutter</a>
                </li>
            </ul>
        </div>
        <div class="flex flex-col gap-5">
            <p class="font-semibold text-lg text-white">Company</p>
            <ul class="flex flex-col gap-[14px]">
                <li>
                    <a href="" class="text-white hover:text-blue-500">Instructor</a>
                </li>
            </ul>
        </div>
        <div class="flex flex-col gap-5">
            <p class="font-semibold text-lg text-white">Resources</p>
            <ul class="flex flex-col gap-[14px]">
                <li>
                    <a href="" class="text-white hover:text-blue-500">FAQ</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="w-full h-[51px] flex items-end border-t border-[#E7EEF2]">
        <p class="mx-auto text-sm text-white -tracking-[2%]">All Rights Reserved SocioEdu 2024</p>
    </div>
</footer>
</html>
