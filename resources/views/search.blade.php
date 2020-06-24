@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <form action="/search" method="GET">
            <input type="text" class="w-full p-3 rounded outline-none text-gray-900"
                   placeholder="Search for products..." value="{{ request('q') }}" name="q" required autofocus>
        </form>
    </div>
    <results :items="{{ json_encode($results) }}"></results>
@endsection
