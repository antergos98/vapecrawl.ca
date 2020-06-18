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

    <style>
        [x-cloak] { display: none; }
    </style>

    <!-- Matomo -->
    <script type="text/javascript">
      var _paq = window._paq = window._paq || [];
      /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//analytics.vapecrawl.ca/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '1']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <!-- End Matomo Code -->
</head>
<body class="bg-gray-900 text-white font-nunito antialiased">
<div id="app" class="relative flex flex-col min-h-screen justify-between">
    <svg class="absolute hidden lg:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#1F2937" fill-opacity="1" d="M0,128L48,138.7C96,149,192,171,288,192C384,213,480,235,576,240C672,245,768,235,864,208C960,181,1056,139,1152,128C1248,117,1344,139,1392,149.3L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>
    <div class="relative z-30">
        <div class="mt-6 mb-16 {{ $attributes['is-home'] ? 'sm:mb-32' : 'sm:mb-24' }}">
            <x-header/>
        </div>

        <main class="mb-8">
            <div class="{{ $attributes['is-home'] ? 'max-w-6xl' : 'max-w-screen-xl' }} mx-auto px-6 xl:px-0 mb-6">
                {{ $slot }}
            </div>
        </main>

    </div>
    <x-footer/>
    <x-age-validation-modal/>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
