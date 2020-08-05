@section('page_title', request('q') ? "Results for ". request('q') : "Results")

<x-layout>
    <Results :items="{{ json_encode($results) }}" q="{{ request('q') }}"/>
</x-layout>
