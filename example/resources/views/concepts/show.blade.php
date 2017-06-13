@extends('layouts.app')
@section('title', 'Concepts')

@section('content')
    <h1>{{$concept->name}}</h1>
    <p>{{$concept->info}}</p>
    <hr>
    <h4>Categorieën</h4>
    @if ($concept->categories->count() > 0)
        <ul class="concats concats-{{$concept->id}} mb-0">
            @foreach($concept->categories as $category)
                <li><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    @endif
    <br>
    <a href="{{route('concepts.index')}}">Terug</a>
@endsection