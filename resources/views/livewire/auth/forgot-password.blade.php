<div>
    <x-jet-authentication-card>
            <x-slot name="logo">
                <p class="dwk-logo text-white text-7xl">DWK</p>
            </x-slot>

            <div class="text-sm text-center text-gray-600">
                Please contact the System Administrators by phoning <br> <b>02392 555912</b> for a password reset.
            </div>

            <div class="flex items-center justify-center mt-4">
                <a href="{{ route('auth.login') }}">
                    <x-jet-button class="ml-4 bg-darkblue-500">
                        {{ __('Back') }}
                    </x-jet-button>
                </a>
            </div>
    </x-jet-authentication-card>
</div>
