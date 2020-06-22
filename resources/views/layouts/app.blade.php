<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white font-nunito">
    <div id="app">
        <nav class="mt-6 mb-12 md:mb-24">
            <div class="max-w-6xl mx-auto px-6 xl:px-0">
                <div class="flex flex-col items-center md:flex-row">
                    <div class="md:mr-12">
                        <a href="/" class="text-3xl font-bold ">Vapecrawl</a>
                    </div>
                    <div class="hidden">
                        <ul class="flex font-bold">
                            <li><a class="mr-4" href="/">Home</a></li>
                            <li><a class="mr-4" href="/contact">Contact us</a></li>
                            <li><a href="/donate">Donate</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <main>
        <div class="max-w-6xl mx-auto px-6 xl:px-0">
            @yield('content')
        </div>
    </main>
</body>
</html>
