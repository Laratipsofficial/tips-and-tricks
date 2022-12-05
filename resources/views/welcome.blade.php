<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <link rel="shortcut icon"
          href="/favicon.jpg"
          type="image/x-jpg">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
          rel="stylesheet">

    @vite('resources/js/app.js')
</head>

<body class="antialiased bg-gray-100">
    @if (Route::has('login'))
        <div class="px-6 py-4 flex items-center justify-end">
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="text-sm text-gray-700 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                   class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <x-card>
            @if (session('success'))
                <x-alert :message="session('success')" />
            @endif

            <form action="{{ route('save-user') }}"
                  method="POST"
                  x-data="{ btnDisabled: false }"
                  x-on:submit="btnDisabled=true"
                  enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <x-label>Name</x-label>
                        <x-input name="name" :value="old('name')" />
                        @error('name')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <x-label>Email</x-label>
                        <x-input type="email"
                                 name="email" />
                    </div>

                    <div>
                        <x-label>Password</x-label>
                        <x-input type="password"
                                 name="password" />
                    </div>

                    {{-- <div>
                        <x-label>Select Role</x-label>
                        <x-select :items="$roles"
                                  name="role_id" />
                    </div> --}}

                    <div>
                        <x-label>Type</x-label>
                        <x-select :items="['admin', 'normal', 'editor']"
                                  name="type"
                                  :value="old('type')" />
                        @error('type')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <x-label>Image</x-label>
                        <x-input name="image"
                                 type="file" />
                        @error('image')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <x-button ::disabled="btnDisabled">Save</x-button>
                    </div>
                </div>
            </form>
        </x-card>

        <x-card>
            <form action="{{ route('home') }}"
                  method="GET">
                <div>
                    <x-label>Name</x-label>
                    <x-input name="name" :value="request('name')"></x-input>
                </div>

                <div class="mt-4">
                    <x-button>Search</x-button>
                    <x-button :href="route('home')">Reset</x-button>
                </div>
            </form>
        </x-card>

        {{-- <div class="my-16"></div> --}}

        <x-card>
            <div>
                <div class="grid grid-cols-5 gap-6 py-2 px-4 font-bold">
                    <div class="col-span-2">Name</div>
                    <div class="col-span-3">Email</div>
                </div>
            </div>
            @foreach ($users as $index => $user)
                <div>
                    <div @class([
                        'grid grid-cols-5 gap-6 py-2 px-4',
                        'border-t' => $loop->first,
                        'border-b' => $loop->last,
                        'bg-gray-100' => $loop->odd,
                    ])>
                        <div class="col-span-2">{{ $user->name }}</div>
                        <div class="col-span-3">{{ $user->email }}</div>
                    </div>
                </div>
            @endforeach

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </x-card>

        <div class="my-16"></div>
    </div>
</body>

</html>
