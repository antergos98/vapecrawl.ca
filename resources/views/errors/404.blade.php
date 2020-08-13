@section('page_title', 'Oops! Page not found')

<x-layout>
    <div class="mb-8">
        <h1 class="page-title">Page not found</h1>
        <p class="md:text-lg">
            Sorry, but the page you are looking for was not found. You may either go to the <a href="/" class="underline">homepage</a> or try a search!
        </p>
    </div>
    @include('shared._search_form_suggestions')
</x-layout>
