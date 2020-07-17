<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') - Vapecrawl</title>

    <meta name="description"
          content="Vapecrawl is search engine where you can quickly find vendors that have the cheapest vape products you are looking for.">

    @includeWhen(app()->environment('production'), 'shared._analytics')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white font-nunito">
@include('shared._import_alert')
<div id="app" class="flex flex-col min-h-screen justify-between">
    <div>
        <nav class="mt-6 mb-12 md:mb-24">
            <div class="max-w-6xl mx-auto px-6 xl:px-0">
                <div class="flex flex-col items-center md:flex-row">
                    <div class="md:mr-12 mb-3 md:mb-0">
                        <a href="/" class="text-3xl font-bold ">Vapecrawl</a>
                    </div>
                    <div>
                        <ul class="flex font-bold space-x-6">
                            <li><a href="/">Home</a></li>
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
    </div>
    <age-validation-modal></age-validation-modal>
    @include('shared._footer')
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
