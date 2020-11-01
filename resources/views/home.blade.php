@section('page_title', '')

<x-layout :is-home="true">
    <div class="mb-8">
        <h1 class="text-3xl font-bold md:text-6xl">Welcome on Vapecrawl.ca</h1>
        <p class="md:text-lg">
            Vapecrawl.ca is a <span class="underline">vape search engine</span> exclusively built for Canadians that lets you search for products you'd like and compare their prices accross multiple Canadian vendors.
        </p>
    </div>
    @include('shared._search_form_suggestions')
    <div class="rounded-lg bg-indigo-600 font-semibold px-4 py-2 flex items-center flex-col sm:flex-row mt-12">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
        <div class="ml-0 mt-3 sm:ml-3 sm:mt-0">
            Without action, you will only be left with two choices of flavors. Make a difference! Visit <a class="underline" href="https://www.droitsdesvapoteurs.ca/" target="_blank">CDVQ's website</a> to participate.
        </div>
    </div>
</x-layout>
