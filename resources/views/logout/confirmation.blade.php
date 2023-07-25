<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Resized Logo">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Your account has been sucessfully logout!') }}
        </div>

        <div class="mt-4 flex items-center justify-between">

            <div>
                <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Login') }}</a>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
