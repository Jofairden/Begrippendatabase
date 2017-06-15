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
    </style>
@endsection

@section('content')
    <hr>
    <hr>
    <h1>Zoek naar begrippen</h1>
    @component('components.concepts.searchbar')
    @endcomponent

    <hr>
    <hr>

    <div class="ajaxHolder">
        @include('components.concepts.ajax',
        ['concepts ' => $concepts])
    </div>

@endsection

@section('scripts')
    <script>
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                let page = window.location.hash.replace('#', '');

                if (page === Number.NaN || page <= 0)
                    return false;
                else
                    getConcepts(page);

            }
        });

        $(document).ready(function() {
            $(document).on('click', '.pagination a', function (e) {
                let url = $(this).attr('href');
                getConcepts(url.split('page=')[1], url.split('query=')[1]);
                e.preventDefault();
            });
        });

        function getConcepts(page, query) {
            let url = '{{route('concepts.ajax.request')}}' + '?page=' + page;
            let hash = page;
            if (query && query.trim().length > 0) {
                url += '&query=' + query;
            }
            $.ajax({
                url : url,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).done(function (data) {
                $('.ajaxHolder').html(data);
                location.hash = hash;
            }).fail(function () {
                console.log("concepts could not be loaded through ajax");
            });
        }

        $("#query").on("keyup", function() {
            let value = $(this).val();
            let page = 1;
            if (window.location.hash) {
                let possiblePage = window.location.hash.replace('#', '');
                if (possiblePage !== Number.NaN
                    && possiblePage > 0)
                {
                    page = possiblePage;
                }
            }
            getConcepts(page, value);
        });

    </script>
@endsection