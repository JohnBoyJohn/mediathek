<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <!--
            NO TAILWINDCSS HERE
            <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        -->
        <link rel="stylesheet" href="{{ mix('css/custom.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        @stack('scripts')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            @include('layouts.navigation')

            <!-- Page Content -->
            <main id="main-content">
                {{ $slot }}
            </main>

            <!-- Page Footer-->
            @include('layouts.footer')
        </div>
    </body>
</html>
