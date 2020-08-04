<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') - Vapecrawl.ca</title>

    <meta name="description"
          content="Vapecrawl.ca is a search engine for vape stuff where you can quickly find Canadian vendors that have the cheapest vape products you are looking for.">
    <meta name="description">

    @includeWhen(app()->environment('production'), 'shared._analytics')

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
</head>
<body class="bg-gray-900 text-white font-nunito border-t-8 border-purple-600">
<div id="app" class="flex flex-col min-h-screen justify-between">
    <div>
        <div class="mt-6 {{ $attributes['is-home'] ? 'md:mb-32': 'md:mb-24' }} mb-12">
            @include('shared._navbar')
        </div>

        <main class="mb-8">
            <div class="{{ $attributes['is-home'] ? 'max-w-4xl' : 'max-w-6xl' }} mx-auto px-6 xl:px-0 mb-6">
                {{ $slot }}
            </div>
        </main>

    </div>
    <age-validation-modal></age-validation-modal>
    @include('shared._footer')
</div>
<script src="/js/manifest.js"></script>
<script src="/js/vendor.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
