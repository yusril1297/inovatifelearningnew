<aside class="left-sidebar"> 
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">

           

            <!-- DASHBOARD -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-layout-dashboard"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>

            <!-- MENU -->
            <li class="nav-small-cap">
                <i class="ti ti-menu-2 nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">MENU</span>
            </li>

            <!-- CATEGORY -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.categories.index') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-category"></i>
                    </span>
                    <span class="hide-menu">Category</span>
                </a>
            </li>

            <!-- MANAGE INSTRUCTOR -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.instructors.index') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-users"></i>
                    </span>
                    <span class="hide-menu">Manage Instructor</span>
                </a>
            </li>

            <!-- MANAGE STUDENTS -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.students.index') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-user"></i>
                    </span>
                    <span class="hide-menu">Manage Students</span>
                </a>
            </li>

            <!-- MANAGE COURSES -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.courses.index') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-book-2"></i>
                    </span>
                    <span class="hide-menu">Manage Courses</span>
                </a>
            </li>

           <!-- LEVELS -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.levels.index') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-stairs"></i>
                    </span>
                    <span class="hide-menu">Levels</span>
                </a>
            </li>


            <!-- ENROLLMENT -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.enrollments.index') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-file-text"></i>
                    </span>
                    <span class="hide-menu">Enrollment</span>
                </a>
            </li>

            <!-- SETTING -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.settings') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-settings"></i>
                    </span>
                    <span class="hide-menu">Setting</span>
                </a>
            </li>

        </ul>
    </nav>
</aside>
