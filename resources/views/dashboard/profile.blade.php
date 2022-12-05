<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded px-12 py-8">
                @if (session('message'))
                    <div class="bg-green-700 text-white px-8 py-4 rounded">{{ session('message') }}</div>
                @endif

                <form action="{{ route('profile') }}"
                      method="POST"
                      class="mt-4">
                    @csrf

                    <div>
                        <x-label>Name</x-label>
                        <x-input name="name"
                                 :value="auth()->user()->name"
                                 required />
                    </div>

                    <div class="mt-4">
                        <x-button>Update</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
