<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Change Role') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Change your role') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.change-role') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <div class="mt-6">
            <x-input-label for="role" value="{{ __('Role') }}" class="sr-only" />

            <select id="role" name="role" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="0">Infirmier</option>
                <option value="1">Laboratoire</option>
            </select>

        </div>

        <x-primary-button>{{ __('Save') }}</x-primary-button>

    </form>


    <div class="flex items-center gap-4">
        @if (session('status') === 'role-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('Role updated.') }}</p>

        @elseif (session('status') === 'role-unchanged')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('You already have this role.') }}</p>

        @elseif (session('status') === 'role-update-failed')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('Invalid role selected. Please try again.') }}</p>
        @endif
    </div>

</section>
