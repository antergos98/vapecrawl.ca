@section('page_title', "Results for ". request('q') ?? 'Search')

<x-layout>
    <Results :items="{{ json_encode($results) }}" q="{{ request('q') }}"/>
</x-layout>
