{{-- <div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <h4 class="logo-text">Admin Dashboard</h4>
        </div>
    </div>

    <!--navigation-->
    <ul class="metismenu" id="menu">

        <!-- Dashboard Menu -->
        @if (Auth::user()->role != 2)
        <li>
            <a href="javascript:;" class="has-arrow" onclick="toggleDropdown(this)">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
               <ul style="display: none;">
                @if (Auth::user()->role == 0)
                    <li><a href="{{ route('admin.dashboard') }}"><i class='bx bx-category'></i>Dashboard</a></li>  
                @endif
                @if (Auth::user()->role == 0)          
                <li><a href="{{ route('admin.categories.index') }}"><i class='bx bx-category'></i>Category</a></li>
                @endif
                @if (Auth::user()->role == 0)
                    <li><a href="{{ route('admin.courses.index') }}"><i class='bx bx-book'></i>Manage Courses</a></li>
                @else
                    <li><a href="{{ route('instructor.courses.index') }}"><i class='bx bx-book'></i>Manage Courses</a></li>
                @endif
                @if (Auth::user()->role == 0)
                <li><a href="{{ route('admin.enrollments.index') }}"><i class='bx bx-folder'></i>Enrollments</a></li>
                    
                @endif
                @if (Auth::user()->role == 0)
                    <li><a href="{{ route('admin.instructors.index') }}"><i class='bx bx-user'></i>Manage Instructors</a></li> 
                @endif
                @if (Auth::user()->role == 0)
                   <li><a href="{{ route('admin.levels.index') }}"><i class='bx bx-trophy'></i>Levels</a></li> 
                @endif
                @if (Auth::user()->role == 0)
                    <li><a href="{{ route('admin.students.index') }}"><i class='bx bx-user'></i>Manage Students</a></li>
                @else
                    <li><a href="{{ route('instructor.students.index') }}"><i class='bx bx-user'></i>Manage Students</a></li>
                @endif

                @if (Auth::user()->role == 0)
                    <li><a href="{{ route('admin.tags.index') }}"><i class='bx bx-tag'></i>Tags</a></li>
                @endif
            </ul>
            @endif
        </li>

        <!-- User Profile Dropdown -->
        <li>
            <a href="javascript:;" class="has-arrow" onclick="toggleDropdown(this)">
                <div class="parent-icon"><i class="bx bx-user-circle"></i></div>
                <div class="menu-title">User Profile</div>
            </a>
            <ul style="display: none;">
                <li><a href="{{ route('profile.edit.avatar') }}"><i class='bx bx-image'></i>Update Avatar</a></li>
                <li><a href="{{ route('profile.edit.cv') }}"><i class='bx bx-file'></i>Update CV Profile</a></li>
                <li><a href="{{ route('profile.edit.information') }}"><i class='bx bx-user'></i>Profile Information</a></li>
                <li><a href="{{ route('profile.edit.password') }}"><i class='bx bx-lock-alt'></i>Update Password</a></li>

                @if (Auth::user()->role !== 0)
                    <li>
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                            <i class='bx bx-user text-danger'></i>Delete Account
                        </a>
                    </li>
                </ul>
            </li>
            @endif

    </ul>
    <!--end navigation-->
</div>

<!-- Modal - moved outside the sidebar structure -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAccountModalLabel">Confirm Account Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your account? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete Account</button>
            </div>
        </div>
    </div>
</div>

<!-- Script -->
<script>
function toggleDropdown(element) {
    var dropdown = element.nextElementSibling;
    if (dropdown && dropdown.tagName.toLowerCase() === "ul") {
        dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
    }
}
</script> --}}

<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<h4 class="logo-text">Admin Dashboard</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					<ul>
						 @if (Auth::user()->role == 0)
                    <li><a href="{{ route('admin.dashboard') }}"><i class='bx bx-category'></i>Dashboard</a></li>  
                @endif
                @if (Auth::user()->role == 0)          
                <li><a href="{{ route('admin.categories.index') }}"><i class='bx bx-category'></i>Kategori</a></li>
                @endif
                @if (Auth::user()->role == 0)
                    <li><a href="{{ route('admin.courses.index') }}"><i class='bx bx-book'></i>Pengolahan Kelas</a></li>
                @else
                    <li><a href="{{ route('instructor.courses.index') }}"><i class='bx bx-book'></i>Pengolahan Kelas</a></li>
                @endif
                @if (Auth::user()->role == 0)
                <li><a href="{{ route('admin.enrollments.index') }}"><i class='bx bx-folder'></i>Enrollments</a></li>
                    
                @endif
                @if (Auth::user()->role == 0)
                    <li><a href="{{ route('admin.instructors.index') }}"><i class='bx bx-user'></i>Pengolahan Instructors</a></li> 
                @endif
                @if (Auth::user()->role == 0)
                   <li><a href="{{ route('admin.levels.index') }}"><i class='bx bx-trophy'></i>Level</a></li> 
                @endif
                @if (Auth::user()->role == 0)
                    <li><a href="{{ route('admin.students.index') }}"><i class='bx bx-user'></i>Pengolahan Siswa</a></li>
                @else
                    <li><a href="{{ route('instructor.students.index') }}"><i class='bx bx-user'></i>Pengolahan Siswa</a></li>
                @endif

                @if (Auth::user()->role == 0)
                    <li><a href="{{ route('admin.tags.index') }}"><i class='bx bx-tag'></i>Tag</a></li>
                @endif

                @if (Auth::user()->role == 0)
                    <li><a href="{{ route('admin.settings') }}"><i class='bx bx-cog'></i></i></i>Setelan</a></li>
                @endif
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-user"></i>
						</div>
						<div class="menu-title">Profile</div>
					</a>
					<ul>
                        <li> <a href="{{ route('profile.edit.information') }}"><i class='bx bx-info-circle'></i>Informasi Profil</a>
						</li>
						<li> <a href="{{ route('profile.edit.avatar') }}"><i class='bx bx-camera'></i>Informasi Foto Profile</a>
						</li>
						<li> <a href="{{ route('profile.edit.cv') }}"><i class='bx bx-file-blank'></i>Informasi CV Profile</a>
						</li>
						<li> <a href="{{ route('profile.edit.password') }}"><i class='	bx bx-lock'></i>Perbarui Password</a>
						</li>
                        @if (Auth::user()->role !== 2)
                    
                    <li>
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                            <i class='bx bx-user text-danger'></i>Hapus Akun
                        </a>
                    </li>
                </ul>
            </li>
            @endif
					</ul>
				</li>
			</ul>
			<!--end navigation-->
		</div>