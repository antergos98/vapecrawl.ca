@extends('layouts.app')

@section('page_title', "Results for ". request('q') ?? 'Search')

@section('content')
    <Results :items="{{ json_encode($results) }}" q="{{ request('q') }}"/>
@endsection
