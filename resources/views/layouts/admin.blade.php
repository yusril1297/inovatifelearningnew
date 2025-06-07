<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png"/>
	<!--plugins-->
	<link rel="stylesheet" href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" />
	{{-- <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"> --}}

	{{-- Loader --}}
	<link rel="stylesheet" href="{{ asset('assets/css/pace.min.css') }}" />
	<script src="{{ asset('assets/js/pace.min.js') }}" ></script>
	{{-- <script src="https://cdn.tailwindcss.com"></script> --}}

	{{-- Bootstrap Css --}}
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
	<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}"/>
	<link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css') }}"/>
	<link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}"/> 
	 <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
  <script>
  document.addEventListener("trix-file-accept", function(event) {
    event.preventDefault(); // mencegah upload file
  });
</script>
	<title>Admin Dashboard</title>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="wrapper">
    <!-- Sidebar Start -->
    @include('layouts.admin.sidebar')
    <!--  Sidebar End -->
      <!--  Header Start -->
      @include('layouts.admin.navbar')
      <!--  Header End -->
      <div class="page-wrapper"  >
       <div class="page-content">
        @yield('content')
       </div>
      </div>
  </div>

  <!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	{{-- <script src="{{ asset('assets/plugins/js/simplebar.min.js') }}"></script>  --}}
	<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset("assets/plugins/chartjs/js/chart.js") }}"></script>
	<script src="{{ asset('assets/js/index.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('assets/js/app.js') }}"></script>
	<script>
		new PerfectScrollbar(".app-container")
	</script>
	@stack('scripts')
	<script>
// Fungsi untuk toggle submenu
// function toggleDropdown(element) {
// var submenu = element.nextElementSibling; // Ambil <ul> berikutnya setelah <a>
// if (submenu.style.display === "none" || submenu.style.display === "") {
//     submenu.style.display = "block"; // Tampilkan submenu
// } else {
//     submenu.style.display = "none"; // Sembunyikan submenu
// }
// }
</script>

</body>

</html>


