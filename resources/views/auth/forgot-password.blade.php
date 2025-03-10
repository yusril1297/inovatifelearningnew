@extends('layouts.front')

@section('content')



    <!-- Section for the heading -->
    <div class="bg-[rgb(59_130_246_/_0.5)] text-black text-center py-12 mb-12">
        <h2 class="text-3xl font-bold">Atur Ulang Password</h2>
    </div>

    <div class="flex justify-center items-center min-h-screen">
    <div class="max-w-3xl w-full bg-white p-10 rounded-lg shadow-lg mb-12">
        <!-- Information text -->
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Lupa kata sandi? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan tautan untuk menyetel ulang kata sandi melalui email yang akan memungkinkan Anda memilih kata sandi baru.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Password Reset Form -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="bg-[rgba(59,130,246,var(--tw-bg-opacity))] hover:bg-blue-600">
                    {{ __('Lanjut Untuk Mengatur') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>




@endsection
