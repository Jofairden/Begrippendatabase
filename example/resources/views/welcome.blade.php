@extends('layouts.app')
@section('title', 'Welkom')

@section('styles')
    <style>
        @media (max-width: 978px) {
            .container {
                padding:0;
                margin:0;
            }

            body {
                padding:0;
            }

            .navbar-fixed-top, .navbar-fixed-bottom, .navbar-static-top {
                margin-left: 0;
                margin-right: 0;
                margin-bottom:0;
            }
        }

        .toggle-removal:hover { 
            cursor: pointer;
        }

        .card-header .float-right a {
            margin-right: 5px;
        }

         .card-header .float-right a:last-child { 
             margin-right: 0;
        }
    </style>
@endsection

@section('content')
    <hr>
    <hr>
    <h1>Zoek naar begrippen</h1>
    @component('components.concepts.searchbar')
    @endcomponent
    <div class="ajaxStats">
        Resultaat
        <span class="ajaxStats-first">{{ $concepts->firstItem() }}</span>
        - <span class="ajaxStats-last">{{ $concepts->lastItem() }}</span>
        van <span class="ajaxStats-total">{{ $concepts->total() }}</span>
        begrippen (pagina <span class="ajaxStats-page">{{ $concepts->currentPage() }}</span>)
    </div>
    <hr>
    <hr>

    <div class="ajaxHolder">
        @include('components.concepts.ajax',
        ['concepts ' => $concepts])
    </div>

    @component('components.modals.modal')
        @slot('title')
            Begrip verwijderen
        @endslot
        @slot('info')
            Weet je zeker dat je dit begrip wilt verwijderen?
        @endslot
    @endcomponent

@endsection

@section('scripts')
    <script>
    let page = 2;
    let url = '{{route('concepts.ajax.request')}}' + '?page=' + page;
    console.log(url);
    </script>
    <script src="{{ asset('js/home.js') }}"></script>
@endsection