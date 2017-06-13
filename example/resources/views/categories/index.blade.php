@extends('layouts.app')
@section('title', 'Categories')

@section('info')
    <p>
        Resultaat {{$categories->count()}} categorieën
    </p>
@endsection

@section('query')
    <form method="get" action="{{route('categories.index')}}" class="form-inline">
        <div class="form-group">
            <input class="hidden" type="hidden" class="form-control" id="sort" name="sort" value="@if(isset($_GET['sort'])){{strip_tags($_GET['sort'])}}@endif" disabled>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="query" name="query" value="@if(isset($_GET['query'])){{strip_tags($_GET['query'])}}@endif">
        </div>

        <button type="submit" class="btn btn-primary mx-sm-3">Zoek</button>
    </form>
@endsection

@section('sort')
    <h3>
        Sorteren
    </h3>
    <ul class="sort-list mb-0">
        <li class="sort-opt"><a href="{{url('/categories/?sort=asc')}}@if(isset($_GET['query']))&query={{$_GET['query']}}@endif">Oplopend alfabet</a></li>
        <li class="sort-opt"><a href="{{url('/categories/?sort=desc' )}}@if(isset($_GET['query']))&query={{$_GET['query']}}@endif">Aflopend alfabet</a></li>
        <li class="sort-opt"><a href="{{url('/categories/?sort=most' )}}@if(isset($_GET['query']))&query={{$_GET['query']}}@endif">Meeste begrippen</a></li>
        <li class="sort-opt"><a href="{{url('/categories/?sort=least' )}}@if(isset($_GET['query']))&query={{$_GET['query']}}@endif">Minste begrippen</a></li>
    </ul>
    <hr>
@endsection

@section('content')

    @yield('sort')
    @yield('query')
    @yield('info')

    @foreach($categories as $category)
        <h1><a href="{{url('/categories/' . $category->id)}}">{{$category->name}}</a></h1>
        @component('components.categories.relationcount')
            @slot('category', $category)
        @endcomponent
        <hr>
    @endforeach

@endsection