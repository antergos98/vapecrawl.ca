<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') Vapecrawl - The best vape search engine in Canada</title>

    <meta name="description"
          content="Vapecrawl is a vape search engine that lets you search across dozens of Canadian vendors to find the products you are looking for at the best price.">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
</head>
<body class="bg-gray-900 text-white font-nunito antialiased">
<div class="absolute inset-0 hidden xl:block">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#4834d4" fill-opacity="1" d="M0,64L48,96C96,128,192,192,288,208C384,224,480,192,576,197.3C672,203,768,245,864,250.7C960,256,1056,224,1152,197.3C1248,171,1344,149,1392,138.7L1440,128L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
</div>
<div id="app" class="relative flex flex-col min-h-screen justify-between">
    <div>
        <div class="mt-6 mb-16 {{ $attributes['is-home'] ? 'sm:mb-32' : 'sm:mb-24' }}">
            @include('shared._header')
        </div>

        <main class="mb-8">
            <div class="{{ $attributes['is-home'] ? 'max-w-6xl' : 'max-w-screen-xl' }} mx-auto px-6 xl:px-0 mb-6">
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
