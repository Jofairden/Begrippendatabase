@extends('layouts.app')
@section('title', 'Concepts')

@section('info')
    <p>
        Resultaat {{$concepts->firstItem()}} - {{$concepts->firstItem() + $concepts->count() - 1}}
        van {{\App\Concept::all()->count()}} begrippen
    </p>
@endsection

@section('content')

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