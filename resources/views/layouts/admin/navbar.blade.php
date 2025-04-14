<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <!-- Notifikasi Icon -->
                <li class="nav-item">
                    <div class="position-relative bg-danger w-fit h-fit">
                        <i class="ti ti-bell fs-4 bg-black" style="font-size: 24px;"></i>
                        
                            @if ($notifications > 0)
                                <span class="position-absolute badge rounded-pill bg-danger" 
                                      style="top: 5px; right: 5px; font-size: 10px;">
                                    {{ $notifications }}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            @endif
                    </div>
                </li>
                
                <!-- Profile Dropdown -->
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Profile Picture -->
                        <img src="{{ Auth::user()->profile_picture_url }}" alt="" width="35" height="35" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="{{ route('profile.edit') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">Profile Saya</p>
                            </a>

                            <a href="{{ route('frontend.home') }}" class="d-flex align-items-center gap-2 dropdown-item">
                            <i class="ti ti-arrow-left fs-6"></i> <!-- Icon for back -->
                            <p class="mb-0 fs-3">Kembali</p>
                            </a>

                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="d-flex align-items-center gap-2 dropdown-item" 
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="ti ti-logout fs-6"></i>
                                    <p class="mb-0 fs-3">Logout</p>
                                </a>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
