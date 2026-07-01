<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    </head>
    <body class="mx-auto mt-10 max-w-2xl bg-slate-50 text-slate-700">
        {{-- {{ auth()->user()->name ?? 'Guest' }} --}}

        <nav class="mb-8 flex justify-between text-lg font-medium">
            <ul class="flex space-x-2">

                <li>
                    <a href="{{ route('jobs.index') }}">Home</a>
                </li>
            </ul>

            <ul class="flex space-x-4">
            @auth
                <li>
                    <a href="{{ route('my-job-application.index') }}">
                        {{ auth()->user()->name ?? 'Anonymous' }}: Application
                    </a>
                </li>
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Logout</button>
                    </form>
                </li>
            @else
                <li>
                <a href="{{ route('auth.create') }}">Sign in</a>
                </li>
            @endauth
            </ul>
        </nav>

        @if(session('success'))
            <div class="mb-4 text-green-600 bg-green-100 border border-green-300 rounded-md p-4" role="alert">
                <p class="text-green-600 font-bold">Success!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 text-red-600 bg-red-100 border border-red-300 rounded-md p-4" role="alert">
                <p class="text-red-600 font-bold">Error!</p>
                <p>{{ session('error') }}</p>
            </div>
        @endif

        {{ $slot }}
    </body>
</html>
