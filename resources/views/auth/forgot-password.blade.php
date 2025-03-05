@extends('layouts.front')

@section('content')

<x-guest-layout>

    <!-- Section for the heading -->
    <div class="bg-[rgb(59_130_246_/_0.5)] text-black text-center py-12 mb-12">
        <h2 class="text-3xl font-bold">Atur Ulang Password</h2>
    </div>

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
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>

@endsection

<!-- Add custom CSS to hide the Laravel icon or logo -->
<style>
    /* Hide the Laravel logo or any default icon if it's present in the layout */
    .laravel-logo { 
        display: none;
    }
</style>
