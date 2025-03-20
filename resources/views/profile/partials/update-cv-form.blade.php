
<section>
    <header class="relative flex justify-between items-center">
        <div>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Update CV Profile') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Personalisasi profil Anda dengan memperbarui CV Profile akun Anda') }}
            </p>
        </div>
        
    </header>

    <form method="post" action="{{ route('profile.update.cv') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="cv" :value="__('cv')" />
            <input id="cv" name="cv" type="file" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('cv')" class="mt-2" />
        </div>

        @if (Auth::user()->cv)
            <div>
                <img src="{{ asset('storage/' . Auth::user()->cv) }}" alt="Current cv" class="h-20 w-20 rounded-full mt-2">
            </div>
        @endif

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'cv-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('cv updated.') }}</p>
            @endif
        </div>
    </form>
</section>
