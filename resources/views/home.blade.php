@section('page_title', 'Home')

<x-layout :is-home="true">
    <div class="mb-12">
        <h1 class="text-2xl mb-6 md:text-3xl">Welcome on Vapecrawl</h1>
        <p class="md:text-lg">
            Vapecrawl is a simple vape search engine that lets you quickly find reputable Canadian vape vendors that
            have the product you are looking for at the cheapest price as possible. We do not <span class="underline">own, sell or advertise</span>
            any of the products listed on this site.
        </p>
    </div>
    <form action="/search" class="flex flex-wrap -mx-3" method="GET">
        <div class="w-full sm:w-5/6 mb-2 sm:mb-0">
            <div class="px-3">
                <input type="text" class="w-full p-3 rounded outline-none text-gray-900"
                       placeholder="Search for products... (12 monkeys, Blotto RTA, Aegis, etc.)" name="q" autofocus>
            </div>
        </div>
        <div class="w-full sm:w-1/6">
            <div class="px-3">
                <button type="submit" class="bg-purple-600 w-full py-3 rounded hover:bg-purple-700 focus:outline-none">
                    Search
                </button>
            </div>
        </div>
    </form>
    <div class="mt-2 block">
        Popular:
        <a class="hover:underline" href="/search?q=blotto+rta">Blotto RTA</a>,
        <a class="hover:underline" href="/search?q=aegis+legend">Aegis Legend</a>,
        <a class="hover:underline" href="/search?q=deathwish">Deathwish</a>,
        <a class="hover:underline" href="/search?q=caliburn">Caliburn</a>
    </div>
</x-layout>
