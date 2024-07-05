<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Connected Accounts') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Connect your social media accounts to automatically update your map.') }}
    </x-slot>

    <x-slot name="form">

        <!-- Instagram -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="instagram_handle" value="{{ __('Instagram Handle') }}" />
            <x-input id="instagram_handle" type="text" class="mt-1 block w-full" wire:model="state.instagram_handle" required autocomplete="instagram_handle" />
            <x-input-error for="instagram_handle" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
