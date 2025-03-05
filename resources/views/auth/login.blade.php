@extends('layouts.front')

@section('content')

<!-- Tambahan di bawah navbar -->
<div class="bg-[rgb(59_130_246_/_0.5)] text-black text-center py-12">
    <h2 class="text-3xl font-bold"> Masuk Akun Anda</h2>
</div>

<section class="bg-gray-50 dark:bg-gray-900 min-h-screen flex items-center justify-center">
    <div class="flex flex-col items-center justify-center px-6 py-16 mx-auto w-full lg:py-20">
        <div class="w-full max-w-2xl bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-12 space-y-8 md:space-y-10 sm:p-16">
                
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-8 md:space-y-10">
                    @csrf

                    <div>
                        <label for="email" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Email Anda</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="nama@perusahaan.com" required autofocus autocomplete="username" value="{{ old('email') }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <label for="password" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Kata Sandi</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" name="remember"
                                    class="w-5 h-5 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                            </div>
                            <div class="ml-3 text-md">
                                <label for="remember" class="text-gray-500 dark:text-gray-300">Ingat saya</label>
                            </div>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-md font-medium text-primary-600 hover:underline dark:text-primary-500 text-blue-500">Lupa kata sandi?</a>
                    </div>

                    <button type="submit"
                        class="w-full text-white bg-primary-600 bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-lg px-6 py-3 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Masuk
                    </button>

                    <p class="text-md font-light text-gray-500 dark:text-gray-400">
                        Belum punya akun? <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500 text-blue-500">Daftar</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection