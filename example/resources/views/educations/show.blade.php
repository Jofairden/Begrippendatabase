@extends('layouts.app')
@section('title', $education->name)

@section('content')
    <h1>{{$education->name}}</h1>
    <hr>
    @component('components.accordion')
            @foreach($education->concepts as $concept)
                    @component('components.accordioncard-concept',
                        ['concept' => $concept])
                    @endcomponent
            @endforeach
    @endcomponent
@endsection