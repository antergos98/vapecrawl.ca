@section('page_title', 'Home')

<x-layout :is-home="true">
    <div class="mb-12">
        <h1 class="page-title">Welcome on Vapecrawl</h1>
        <p class="md:text-lg">
            Vapecrawl is a simple vape search engine that lets you quickly find reputable Canadian vape vendors that
            have the product you are looking for at the cheapest price as possible. We do not <span class="underline">own, sell or advertise</span>
            any of the products listed on this site.
        </p>
    </div>
    @include('shared._search_form_suggestions')
</x-layout>
