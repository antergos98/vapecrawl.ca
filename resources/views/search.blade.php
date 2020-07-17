@extends('layouts.app')

@section('page_title', request('q') ?? 'Search')

@section('content')
    <results :items="{{ json_encode($results) }}" q="{{ request('q') }}"></results>
@endsection
