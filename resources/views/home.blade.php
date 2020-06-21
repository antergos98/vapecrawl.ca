@extends('layouts.app')

@section('content')
    <div>
        <form action="/search" method="GET">
            <input type="text" class="w-full p-3 rounded outline-none text-gray-900" placeholder="Search for products..." name="q" required autofocus>
        </form>
    </div>
@endsection
