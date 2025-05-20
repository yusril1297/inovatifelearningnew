<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"
                        data-bs-target="#SearchModal">
                        <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ Auth::user()->profile_picture_url }}" class="user-img" alt="user avatar">
                    <div class="user-info">
                        <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                        <p class="designation mb-0">
                            {{ Auth::check() ? (Auth::user()->role == 0 ? 'admin' : (Auth::user()->role == 1 ? 'tutor' : 'student')) : '' }}
                        </p>

                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="javascript:;">
                            <i class="bx bx-user fs-5"></i><span>Profile</span>
                        </a></li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="d-flex align-items-center gap-2 dropdown-item"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="bx bx-log-out fs-7"></i> <!-- Ikon logout dengan ukuran fs-5 -->
                            <span class="mb-0 fs-9">Logout</span> <!-- Ukuran font Logout disesuaikan dengan Profile -->
                        </a>
                    </form>
                </ul>

            </div>
        </nav>
    </div>
</header>