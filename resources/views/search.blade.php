@extends('layouts.app')

@section('page_title', request('q') ?? 'Search')

@section('content')
    <Results :items="{{ json_encode($results) }}" q="{{ request('q') }}"/>
@endsection
