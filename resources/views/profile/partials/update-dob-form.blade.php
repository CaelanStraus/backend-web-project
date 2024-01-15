<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Date of Birth') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Update your date of birth.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update.dob') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-date-input id="dob" name="dob" class="mt-1 block w-full" :value="old('dob', $user->dob)" :label="__('Date of Birth')" required />
            <x-input-error class="mt-2" :messages="$errors->get('dob')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'dob-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
