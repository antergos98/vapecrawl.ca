@extends('layouts.app')

@section('page_title', 'Home')

@section('content')
    <div>
        <div class="mb-6">
            <h1 class="text-2xl mb-6 md:text-3xl">Welcome on Vapecrawl</h1>
            <p>
                Vapecrawl is a simple vape search engine that links consumers with reputable Canadian vendors. Start by typing something in the searchbar below to compare prices.
            </p>
        </div>
        <form action="/search" method="GET">
            <input type="text" class="w-full p-3 rounded outline-none text-gray-900"
                   placeholder="Search for products..." name="q" required autofocus>
        </form>
    </div>
@endsection
