<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') - Vapecrawl.ca</title>

    <meta name="description"
          content="Vapecrawl.ca is search engine where you can quickly find Canadian vendors that have the cheapest vape products you are looking for.">

    @production
        @include('shared._analytics')
    @endproduction

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"
    />
    <livewire:styles/>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="icon"
          type="image/png"
          href="{{ asset('favicon.png') }}">
</head>
<body class="bg-gray-900 text-white font-nunito">
@include('shared._import_alert')
<div class="flex flex-col min-h-screen justify-between">
    <div>
        @include('shared._header')
        <main class="mb-8">
            <div class="max-w-6xl mx-auto px-6 xl:px-0 mb-6">
                @yield('content')
            </div>
        </main>
    </div>
    <age-validation-modal></age-validation-modal>
    @include('shared._footer')
</div>
<livewire:scripts/>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
