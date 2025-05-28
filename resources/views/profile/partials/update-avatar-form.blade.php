

<section>
    <header class="relative flex justify-between items-center">
        <div>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Perbarui Gambar Profil') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Perbarui foto profil Anda untuk membuat profil lebih personal.') }}
            </p>
        </div>
        
    </header>

    <form method="post" action="{{ route('profile.update.avatar') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="avatar" :value="__('Gambar Profil')" />
            <input id="avatar" name="avatar" type="file" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
        </div>

        @if (Auth::user()->avatar)
            <div>
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Current Avatar" class="h-20 w-20 rounded-full mt-2">
            </div>
        @endif

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'avatar-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Avatar updated.') }}</p>
            @endif
        </div>
    </form>
</section>

