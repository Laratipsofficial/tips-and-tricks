<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" id="shops">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($users as $user)
                <div class="grid grid-cols-2 gap-6 px-4 p-2 {{ $loop->odd ? 'bg-white' : '' }}">
                    <div>{{ $user->name }}</div>
                    <div>{{ $user->latestLogin->logged_in_at }}</div>
                </div>
            @endforeach
        </div>
    </div>

    @push('script')

    @endpush
</x-app-layout>
