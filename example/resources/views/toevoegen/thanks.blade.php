@extends('layouts.app')

@section('title', 'Dankjewel')

@section('content')
    <h1>Dankjewel!</h1>

    <p>Je suggestie wordt zo snel mogelijk bekeken door een beheerder. Zodra de status van je suggestie veranderd, ontvang je een mail. </p>
    <a href="{{ URL::to('/') }}">Naar homepage</a>
    
@endsection