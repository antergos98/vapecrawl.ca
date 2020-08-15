<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') - Vapecrawl.ca</title>

    <meta name="description"
          content="Vapecrawl is a vape search engine that lets you search across dozens of Canadian vendors to find the products you are looking for at the best price.">

    @includeWhen(app()->environment('production'), 'shared._analytics')

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
</head>
<body class="bg-gray-900 text-white font-nunito border-t-8 border-purple-600 antialiased">
<div id="app" class="flex flex-col min-h-screen justify-between">
    <div>
        <div class="mt-6 mb-16 {{ $attributes['is-home'] ? 'sm:mb-32' : 'sm:mb-24' }}">
            @include('shared._header')
        </div>

        <main class="mb-8">
            <div class="{{ $attributes['is-home'] ? 'max-w-5xl' : 'max-w-screen-xl' }} mx-auto px-6 xl:px-0 mb-6">
                {{ $slot }}
            </div>
        </main>

    </div>
    @include('shared._footer')
    <age-validation-modal/>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
