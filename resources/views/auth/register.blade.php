@extends('layouts.front')

@section('content')


<div class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:w-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Buat akun
                </h1>

                <!-- Register Form Start -->
                <form method="POST" action="{{ route('register') }}" class="space-y-4 md:space-y-6">
                    @csrf <!-- CSRF Token for form security -->

                    <!-- Name -->
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-50 dark:text-white">Nama Anda</label>
                        <input type="text" name="name" id="name" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nama Anda" required value="{{ old('name') }}">
                        <!-- Display errors for name -->
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Anda</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="nama@gmail.com" required value="{{ old('email') }}">
                        <!-- Display errors for email -->
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata Sandi</label>
                        <input type="password" name="password" id="password" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                        <!-- Display errors for password -->
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Kata Sandi</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                        <!-- Display errors for confirm password -->
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Register As (Optional Role Selection Example) -->
                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white">Daftar sebagai:</label>
                        <div class="flex justify-center space-x-4">
                            <!-- Button Teacher -->
                            <button type="button" id="teacher-btn"
                                class="bg-blue-500 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-300 transition ease-in-out duration-150">
                                Instruktur
                            </button>
                    
                            <!-- Button Student -->
                            <button type="button" id="student-btn"
                                class="bg-gray-200 text-gray-800 font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-gray-300 transition ease-in-out duration-150">
                                Siswa
                            </button>
                        </div>
                    
                        <!-- Hidden Input to Store Role -->
                        <input type="hidden" name="role" id="role-input" value="2"> <!-- Default: Student -->
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" aria-describedby="terms" type="checkbox" 
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-light text-gray-500 dark:text-gray-300">Saya menerima <a
                                    class="font-medium text-primary-600 hover:underline dark:text-primary-500 text-blue-600"
                                    href="#">Syarat dan Ketentuan</a></label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 bg-blue-500">
                        Buat akun
                    </button>

                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Sudah punya akun? <a href="{{ route('login') }}"
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500 text-blue-500">Masuk di sini</a>
                    </p>

                </form>
                <!-- Register Form End -->

                <script>
                    // JavaScript to toggle active state between instructor and student buttons
                    const teacherBtn = document.getElementById('teacher-btn');
                    const studentBtn = document.getElementById('student-btn');
                    const roleInput = document.getElementById('role-input');
                
                    // Set the role when the "Instructor" button is clicked
                    teacherBtn.addEventListener('click', () => {
                        roleInput.value = "1"; // Instructor value
                        teacherBtn.classList.add('bg-blue-500', 'text-white');
                        teacherBtn.classList.remove('bg-gray-200', 'text-gray-800');
                
                        studentBtn.classList.add('bg-gray-200', 'text-gray-800');
                        studentBtn.classList.remove('bg-blue-500', 'text-white');
                    });
                
                    // Set the role when the "Student" button is clicked
                    studentBtn.addEventListener('click', () => {
                        roleInput.value = "2"; // Student value
                        studentBtn.classList.add('bg-blue-500', 'text-white');
                        studentBtn.classList.remove('bg-gray-200', 'text-gray-800');
                
                        teacherBtn.classList.add('bg-gray-200', 'text-gray-800');
                        teacherBtn.classList.remove('bg-blue-500', 'text-white');
                    });
                </script>
            </div>
        </div>
    </div>
</div>

@endsection
