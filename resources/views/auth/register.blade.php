@extends('layouts.front')

@section('content')


<div class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:w-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Create an account
                </h1>

                <!-- Register Form Start -->
                <form method="POST" action="{{ route('register') }}" class="space-y-4 md:space-y-6">
                    @csrf <!-- CSRF Token for form security -->

                    <!-- Name -->
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-50 dark:text-white">Your name</label>
                        <input type="text" name="name" id="name" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your name" required value="{{ old('name') }}">
                        <!-- Display errors for name -->
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="name@company.com" required value="{{ old('email') }}">
                        <!-- Display errors for email -->
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                        <!-- Display errors for password -->
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                        <!-- Display errors for confirm password -->
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Register As (Optional Role Selection Example) -->
                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white">Register as:</label>
                        <div class="flex justify-center space-x-4">
                            <!-- Button Teacher -->
                            <button type="button" id="teacher-btn"
                                class="bg-blue-500 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-300 transition ease-in-out duration-150">
                                Instructor
                            </button>
                    
                            <!-- Button Student -->
                            <button type="button" id="student-btn"
                                class="bg-gray-200 text-gray-800 font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-gray-300 transition ease-in-out duration-150">
                                Student
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
                            <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a
                                    class="font-medium text-primary-600 hover:underline dark:text-primary-500 text-blue-600"
                                    href="#">Terms and Conditions</a></label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 bg-blue-500">
                        Create an account
                    </button>

                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Already have an account? <a href="{{ route('login') }}"
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500 text-blue-500">Login here</a>
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






{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

          <!-- Role Selection -->
          <div class="mt-4">
            <x-input-label for="role" :value="__('Register as')" />
            <select id="role" name="role" class="block mt-1 w-full">
                <option value="2">Student</option>
                <option value="1">Instructor</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
