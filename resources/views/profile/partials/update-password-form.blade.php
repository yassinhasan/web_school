<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 action-title">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 action-title">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>
    @if(auth('student'))
    <form method="post" action="{{ route('student.password.update') }}" class="mt-6 space-y-6">
    @endif    
    @if(auth('user'))
    <form method="post" action="{{ route('user.password.update') }}" class="mt-6 space-y-6">
    @endif    
        @csrf
        @method('put')
        <input type="text" autocomplete="username" hidden>
        <div>
            <x-input-label for="current_password" :value="__('Current Password')" class="action-title" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password1" :value="__('New Password')" class="action-title" />
            <x-text-input id="password1" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"  class="action-title"/>
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 action-title"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
