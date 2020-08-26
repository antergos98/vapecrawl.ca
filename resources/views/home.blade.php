@section('page_title', 'Home')

<x-layout :is-home="true">
    <div class="mb-8">
        <h1 class="text-3xl font-bold mb-3 md:text-5xl">Welcome on Vapecrawl, the best vape search engine in Canada!</h1>
        <p class="md:text-lg">
            Vapecrawl is a <span class="underline">vape search engine</span> that lets you search across dozens of Canadian vendors ({{ \App\Vendor::count() }} to be exact) to find the products you are looking for at the best price.
        </p>
    </div>
    @include('shared._search_form_suggestions')
</x-layout>
