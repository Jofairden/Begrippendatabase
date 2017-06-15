@extends('layouts.app')
@section('title', 'Welkom')

@section('content')
    <hr>
    <hr>
    <h1>Zoek naar begrippen</h1>
    @component('components.concepts.searchbar',
    [ 'withSubmit' => true])
    @endcomponent

    <hr>
    <hr>
@endsection