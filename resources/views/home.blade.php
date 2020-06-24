@extends('layouts.app')

@section('content')
    <div>
        <div class="mb-6">
            <h1 class="text-2xl mb-6 md:text-3xl">Welcome on Vapecrawl</h1>
            <p>
                Vapecrawl is a simple search engine that let you search through our database of 17 000+ products sold by
                several Canadian vendors. Vapecrawl is an attempt to scratch my own itch, but I thought it would
                be great to share it with everyone. <br><br> We know it can be a pain in the ass to spend hours on Google to find
                who
                carries the product you are looking for for the cheapest price possible. Whether you are looking for a new
                mod, tank or whatever else related to vaping, we got you covered! Please note that we do not own or sell any of the products listed on this site. Vapecrawl is intended to be used by adults ONLY!
            </p>
        </div>
        <form action="/search" method="GET">
            <input type="text" class="w-full p-3 rounded outline-none text-gray-900"
                   placeholder="Search for products..." name="q" required autofocus>
        </form>
    </div>
@endsection
