@extends('layouts.app')

@section('content')
    <div>
        <div class="mb-3">
            <h1 class="text-4xl">Welcome on Vapecrawl</h1>
            <p>
                Vapecrawl is a simple search engine that let you search through our database of 15 000 products sold by
                dozens of reputable Canadian vendors. Vapecrawl is an attempt to scratch my own itch, but I thought it would
                be great to share it with everyone. <br><br> We know it can be a pain in the ass to spend hours on Google to find
                who
                carries the product you are looking for for the cheapest price possible. Whether you are looking for a new
                mod, tank or whatever else related to vaping, we got you covered!
            </p>
        </div>
        <form action="/search" method="GET">
            <input type="text" class="w-full p-3 rounded outline-none text-gray-900"
                   placeholder="Search for products..." name="q" required autofocus>
        </form>
    </div>
@endsection
