@extends('layouts.app')
@section('title', $education->name)

@section('content')
    <h1>{{$education->name}}</h1>
    <hr>
    @component('components.accordion')
            @foreach($education->categories as $category)
                @component('components.categories.category')
                    @slot('category', $category)
                @endcomponent
            @endforeach
    @endcomponent
@endsection