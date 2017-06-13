@extends('layouts.app')
@section('title', $category->name)

@section('content')
    <h1>{{$category->name}}</h1>
    @component('components.categories.relationcount')
        @slot('category', $category)
    @endcomponent
    <hr>
    @component('components.accordion')
            @foreach($category->concepts as $concept)
                @component('components.accordioncard-concept')
                    @slot('concept', $concept)
                @endcomponent
                <br>
            @endforeach
    @endcomponent
@endsection