<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/favicon.jpg" type="image/x-jpg">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        @vite('resources/js/app.js')
    </head>
    <body class="antialiased bg-gray-100">
        @if (Route::has('login'))
            <div class="px-6 py-4 flex items-center justify-end">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                @if(session('success'))
                    <x-alert :message="session('success')" />
                @endif

                <form action="{{ route('save-user') }}" method="POST" x-data="{btnDisabled: false}" x-on:submit="btnDisabled=true" enctype="multipart/form-data">
                    @csrf

                    {{-- <input type="hidden" name="type" value="admin"> --}}

                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <x-label>Name</x-label>
                            <x-input name="name" />
                        </div>

                        <div>
                            <x-label>Email</x-label>
                            <x-input type="email" name="email" />
                        </div>

                        <div>
                            <x-label>Password</x-label>
                            <x-input type="password" name="password" />
                        </div>

                        <div>
                            <x-label>Select Role</x-label>
                            <x-select :items="$roles" name="role_id" />
                        </div>

                        <div>
                            <x-label>Image</x-label>
                            <x-input name="image" type="file" />
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

            <div class="my-16"></div>

            <x-card>
                @foreach ($users as $index => $user)
                    @include('users')
                @endforeach
            </x-card>

            <div class="my-16"></div>
        </div>
    </body>
</html>
