@extends('layouts.app')
@section('title', 'Concepts')

@section('info')
    <p>
        Resultaat {{$concepts->firstItem()}} - {{$concepts->firstItem() + $concepts->count() - 1}}
        van {{\App\Concept::all()->count()}} begrippen
    </p>
@endsection

@section('query')
    <form method="get" action="{{route('concepts.index')}}" class="form-inline">
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
        <li class="sort-opt"><a href="{{url('/concepts/?sort=asc')}}@if(isset($_GET['query']))&query={{$_GET['query']}}@endif">Oplopend alfabet</a></li>
        <li class="sort-opt"><a href="{{url('/concepts/?sort=desc' )}}@if(isset($_GET['query']))&query={{$_GET['query']}}@endif">Aflopend alfabet</a></li>
    </ul>
    <hr>
@endsection

@section('content')

    @yield('sort')
    @yield('query')
    @yield('info')
    {{$concepts->links('vendor.pagination.bootstrap-4')}}

    @component('components.accordion')
        @foreach($concepts as $concept)
            @component('components.accordioncard-concept')
                @slot('concept', $concept)
            @endcomponent
            <br>
        @endforeach
    @endcomponent

    {{$concepts->links('vendor.pagination.bootstrap-4')}}
    @yield('info')

@endsection