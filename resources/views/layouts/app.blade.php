<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Feuilles de styles personnalisées -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>

<body class="antialiased bg-gray-100">
    <div class="min-h-screen flex flex-col">
        @include('layouts.navigation')
        <!-- 
        @isset($header)
            <header class="shadow-sm bg-white">
                <div class="container py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset 
        -->

        <div class="flex flex-grow">
            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-md hidden sm:block">
                @include('layouts.sidebar')
            </aside>

            <!-- Contenu principal -->
            <main class="flex-grow p-6">  
                @isset($header)
                    <header class="shadow-sm bg-white">
                        <div class="container py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset 
       
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
