<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <h2>Sertifikat Saya</h2>
    <ul>
<<<<<<< HEAD
    @foreach(Auth::user()->certificates ?? [] as $certificate)
        <li>
            {{ $certificate->course->title }} - 
            <a href="{{ route('certificate.download', $certificate->id) }}">Unduh</a>
        </li>
    @endforeach
</ul>

=======
        @foreach(optional(Auth::user())->certificates ?? [] as $certificate)
            <li>
                {{ $certificate->course->title }} - 
                <a href="{{ route('certificate.download', $certificate->id) }}">Unduh</a>
            </li>
        @endforeach
    </ul>
>>>>>>> 086c90eefae4b510cfc1bce95c6e7963d84b65cf
    
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Avatar Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-avatar-form')
                    
                </div>
            </div>


            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
