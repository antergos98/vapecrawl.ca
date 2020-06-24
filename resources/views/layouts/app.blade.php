<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vapecrawl</title>
    <meta name="description"
          content="Vapecrawl is search engine where you can quickly find vendors that have the cheapest vape products you are looking for.">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167607170-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-167607170-1');
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white font-nunito">
@include('shared._import_alert')
<div id="app">
    <nav class="mt-6 mb-12 md:mb-24">
        <div class="max-w-6xl mx-auto px-6 xl:px-0">
            <div class="flex flex-col items-center md:flex-row">
                <div class="md:mr-12 mb-3 md:mb-0">
                    <a href="/" class="text-3xl font-bold ">Vapecrawl</a>
                </div>
                <div>
                    <ul class="flex font-bold">
                        <li><a class="mr-4" href="/">Home</a></li>
                        <li><a href="/contact">Contact us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="max-w-6xl mx-auto px-6 xl:px-0">
            @yield('content')
        </div>
    </main>
    <age-validation-modal></age-validation-modal>
</div>
<script src="/js/manifest.js"></script>
<script src="/js/vendor.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
