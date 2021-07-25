<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" id="shops">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('welcome') }}"
                class="px-16 py-6 rounded bg-red-600 text-white">Normal Route</a>

            <a href="@route('welcome', ['from' => 'dashboard'])"
                class="ml-8 px-16 py-6 rounded bg-blue-600 text-white">Directive Route</a>
        </div>
    </div>

    @push('script')

    @endpush
</x-app-layout>
