<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" id="shops">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ url('test') }}"
                class="px-16 py-6 rounded bg-red-600 text-white">Test Route</a>
        </div>
    </div>

    @push('script')

    @endpush
</x-app-layout>
