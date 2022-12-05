<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded px-12 py-8">
                <form action="#"
                      method="POST"
                      class="mt-4">
                    @csrf

                    <div>
                        <x-label>Name</x-label>
                        <x-input name="name"
                                 :value="$user->name"
                                 required />
                    </div>

                    <div>
                        <x-label>Select Role</x-label>
                        <x-select :items="$roles"
                                  name="role_id" />
                    </div>

                    <div class="mt-4">
                        <x-button>Update</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
