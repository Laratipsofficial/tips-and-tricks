<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/favicon.jpg" type="image/x-jpg">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="//unpkg.com/alpinejs" defer></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
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
            <div class="space-y-2">
                {{-- <x-categories :categories="$categories" /> --}}

                <div class="bg-white rounded shadow p-16">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, facilis odio quos impedit quasi nisi atque ab perferendis rerum, expedita quia temporibus accusantium totam distinctio laboriosam, illum aliquid. Corrupti, eum.
                </div>

                @dump(optional(Cache::get('user'))->toArray())
            </div>
        </div>
    </body>
</html>
