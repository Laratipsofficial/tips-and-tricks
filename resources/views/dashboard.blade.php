<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" id="shops">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div @class([
                'p-4 random',
                'bg-green-600' => $isActive,
                'bg-gray-400' => $isDisabled,
            ])>Dashboard Page</div>
        </div>
    </div>

    @push('script')

    @endpush
</x-app-layout>
