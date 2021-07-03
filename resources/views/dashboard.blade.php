<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" id="shops">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            Dashboard Page
        </div>
    </div>

    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.8/push.min.js"></script>

        <script>
            Push.create('Hello World!', {
                timeout: 2000,
                requireInteraction: true,
                body: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, expedita.',
                onClick() {
                    location.href = "/";
                }
            })
            .catch(e => {
                alert('please enable notification')
                console.log(e);
            })
        </script>
    @endpush
</x-app-layout>
