@extends('layouts.app')
@section('title', 'Mijn notities')

@section('content')
    <?php $user = Auth::user(); ?>
    <h1>Notities van {{ $user->name }}</h1>
    @include('components.notes.note-create-button')
    <hr>
    @foreach($user->notes() as $note)
        @component('components.notes.note-card',
        ['note' => $note,
        'conceptInfo' => true])
        @endcomponent
    @endforeach
@endsection