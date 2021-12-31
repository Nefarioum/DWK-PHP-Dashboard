<div>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <p class="dwk-logo text-white text-7xl">DWK</p>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />


        @if ($accountMade === 0)
        <form method="POST" wire:submit.prevent="createUser">
            @csrf
            <div>
                <x-jet-label for="userid" value="{{ __('UserID') }}" />
                <x-jet-input wire:model.debounce.500ms="userid" id="userid" class="block mt-1 w-full" type="text" name="userid" :value="old('userid')" required autofocus autocomplete="userid" />
            </div>

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Full Name') }}" />
                <x-jet-input wire:model.debounce.500ms="name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input wire:model.debounce.500ms="email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
        @else
        <div class="pt-2 pb-4 flex">
            <div class="ml-2 w-0 flex-1">
                <p class="flex text-lg font-medium text-gray-900">Account Created!
                    <span class="ml-1">
                        <x-symbols.green-circle-check class="flex" />
                    </span>
                </p>
                <p class="mt-1 text-s leading-5 text-gray-500">
                    Account for {{ $name }}, has been created. <br>The password has been set to: dwktemppassword
                </p>
            </div>
        </div>
            <x-jet-button wire:click="resetPage" class="ml-2 bg-darkblue-500">
                {{ __('Back') }}
            </x-jet-button>
        @endif
    </x-jet-authentication-card>
</div>
