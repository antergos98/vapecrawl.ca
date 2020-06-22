@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <form action="/search" method="GET">
            <input type="text" class="w-full p-3 rounded outline-none text-gray-900" placeholder="Search for products..." value="{{ request('q') }}" name="q" required autofocus>
        </form>
    </div>
    <div class="flex flex-wrap -mx-3">
        @foreach($results as $result)
            <div class="w-full md:w-1/2 px-3 mb-6">
                <div class="bg-gray-800 p-6 rounded">
                    <div class="flex flex-col md:flex-row">
                        <div class="flex flex-shrink-0 mb-6 md:mb-0 md:mr-6">
                            <div class="object-cover mx-auto w-48 md:w-24 lg:w-32 h-full">
                                <img class="block mx-auto h-48 md:h-24 lg:h-32 rounded" src="{{ $result->image }}" alt="">
                            </div>
                        </div>
                        <div class="flex flex-col justify-between">
                            <div>
                                <div class="text-xl">
                                    <a href="{{ $result->url }}" target="_blank" title="{{ $result->name }}">{{ $result->name }}</a>
                                </div>
                                <div class="text-gray-600 text-sm">Sold by <a href="{{ $result->vendor->url }}" target="_blank" title="{{ $result->vendor->name }}">{{ $result->vendor->name }}</a></div>
                            </div>
                            <div class="text-lg">
                                {{ number_format($result->price / 100, 2) }} $
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
