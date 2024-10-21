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
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    @yield('show')
    <!-- Flickity CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
</head>

<body>
   
    


    @include('layouts.front.navbar')



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
    @include('layouts.front.footer')

    

{{-- @include('layouts.front.footer') --}}




</html>
