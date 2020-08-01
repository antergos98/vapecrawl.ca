@extends('layouts.app')

@section('page_title', 'Home')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl mb-6 md:text-3xl">Welcome on Vapecrawl</h1>
        <p class="md:text-lg">
            Vapecrawl is a simple vape search engine that lets you quickly find reputable Canadian vape vendors that have the product you are looking for at the cheapest price as possible. We do not <span class="underline">own, sell or advertise</span> any of the products listed on this site.
        </p>
    </div>
    <form action="/search" method="GET">
        <div class="mb-3">
            <input type="text" class="w-full p-3 rounded outline-none text-gray-900"
                   placeholder="Search for products..." name="q" autofocus>
        </div>
        <div>
            <button type="submit" class="bg-purple-600 py-3 px-12 rounded hover:bg-purple-700 focus:outline-none">
                Search
            </button>
        </div>
    </form>
@endsection
