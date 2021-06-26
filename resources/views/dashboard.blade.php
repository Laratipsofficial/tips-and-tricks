<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg grid grid-cols-3 gap-4">
                <div class="bg-white border-b border-gray-200">
                </div>
                <div class="bg-white border-b border-gray-200">
                    <a href="/page1" target="_blank">Page 1</a>

                    <a href="/page2" target="blank">Page 2</a>
                </div>
                <div class="bg-white border-b border-gray-200">
                    <a class="block p-6" href="/page3" target="documentation">Page 3</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
