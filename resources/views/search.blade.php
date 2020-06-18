@section('page_title', request('q') ? "Results for ". request('q') . " -" : "Results -")

<x-guest-layout>
    <x-back-to-top/>
    <Results :items="{{ json_encode($results->items()) }}" q="{{ request('q') }}"/>
</x-guest-layout>
