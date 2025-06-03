
<head>
  <link href="https://unpkg.com/@tabler/icons-webfont@latest/tabler-icons.min.css" rel="stylesheet">
</head>

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.html" class="text-nowrap logo-img">
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
  <ul id="sidebarnav">
    
    <!-- Home/Dashboard -->
    <li class="sidebar-item">
      <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
        <span>
          <i class="ti ti-home"></i>
        </span>
        <span class="hide-menu">Dashboard</span>
      </a>
    </li>

    <!-- Manage Student -->
    <li class="sidebar-item">
      <a class="sidebar-link" href="{{ route('instructor.students.index') }}" aria-expanded="false">
        <span>
          <i class="ti ti-users"></i>
        </span>
        <span class="hide-menu">Pengolahan Siswa/span>
      </a>
    </li>

    <!-- Courses -->
    <li class="sidebar-item">
      <a class="sidebar-link" href="{{ route('instructor.courses.index') }}" aria-expanded="false">
        <span>
          <i class="ti ti-book"></i>
        </span>
        <span class="hide-menu">Kelas</span>
      </a>
    </li>

    <!-- Profile -->
    <li class="sidebar-item">
      <a class="sidebar-link" href="{{ route('profile.edit') }}" aria-expanded="false">
        <span>
          <i class="ti ti-user-circle"></i>
        </span>
        <span class="hide-menu">Profile</span>
      </a>
    </li>


  </ul>
</nav>
<!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>

  






