@section('page_title', '')

<x-layout :is-home="true">
    <div class="mb-8">
        <h1 class="text-3xl font-bold md:text-6xl">Welcome on Vapecrawl.ca</h1>
        <p class="md:text-lg">
            Vapecrawl.ca is a <span class="underline">vape search engine</span> exclusively built for Canadians that lets you search for products you'd like and compare their prices accross multiple Canadian vendors.
        </p>
    </div>
    @include('shared._search_form_suggestions')
</x-layout>
