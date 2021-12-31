<div>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <p class="dwk-logo text-white text-7xl">DWK</p>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" wire:submit.prevent="login">
            @csrf
            <div>
                <x-jet-label for="userid" value="{{ __('UserID') }}" />
                <x-jet-input wire:model.debounce.500ms="userid" id="userid" class="block mt-1 w-full" type="text" name="userid" :value="old('userid')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input wire:model.debounce.500ms="password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('auth.forgot-password') }}">
                        {{ __('Forgot your password?') }}
                </a>

                <x-jet-button class="ml-4 bg-darkblue-500">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</div>
