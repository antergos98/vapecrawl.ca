@section('page_title', 'Oops! Page not found')

<x-guest-layout>
    <div class="mb-8">
        <h1 class="page-title">Page not found</h1>
        <p class="md:text-lg">
            Sorry, but the page you are looking for was not found.
        </p>
    </div>
    @include('shared._search_form')
</x-guest-layout>
