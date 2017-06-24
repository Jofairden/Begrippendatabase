@extends('layouts.app')
@section('title', 'Mijn notities')

@section('content')
    <?php $user = Auth::user(); ?>
    <h1>Profiel van {{ $user->name }}</h1>
    <hr>
    <dl>
        <dt>Naam</dt>
        <dd>{{ $user->name }}</dd>
        <dt>E-mail adres</dt>
        <dd>{{ $user->email }}</dd>
        <dt>Account aangemaakt op</dt>
        <dd>{{ $user->created_at }}</dd>
        <dt>Account laatst geüpdatet op</dt>
        <dd>{{ $user->updated_at }}</dd>
    </dl>
    <a class="btn btn-primary" href="{{ url('password/reset') }}" role="button">Wachtwoord aanpassen</a>
@endsection