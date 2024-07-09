<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("This place has it all.") }}

                    @php
    $user = Auth::user();
    $isAdmin = $user ? $user->hasRole('Admin') : false;
    $gateAllows = Gate::allows('admin');
@endphp

<div>
    Debug Info:
    <pre>
    User: {{ $user ? $user->name : 'Not logged in' }}
    Is Admin (from User model): {{ $isAdmin ? 'Yes' : 'No' }}
    Gate Allows Admin: {{ $gateAllows ? 'Yes' : 'No' }}
    </pre>
</div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
