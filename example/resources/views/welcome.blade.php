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

@endsection

@section('scripts')
    <script>
        // deal with window hash
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                let page = window.location.hash.replace('#', '');

                if (page === Number.NaN || page <= 0)
                    return false;
                else
                    getConcepts(page, $("#query").val(), $("input:radio[id^='sortName']:checked").attr('id'));
            }
        });

        // override for pagination urls
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function (e) {
                let url = $(this).attr('href');
                getConcepts(url.split('page=')[1], url.split('query=')[1], url.split('sort=')[1]);
                e.preventDefault();
            });
        });

        // ajax function to get concepts
        function getConcepts(page, query, sort) {
            let url = '{{route('concepts.ajax.request')}}' + '?page=' + page;
            let hash = page;
            if (query && query.trim().length > 0)
                url += '&query=' + query;
            if (sort && sort.trim().length > 0)
                url += '&sort=' + sort;

            $.ajax({
                url : url,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).done(function (data) {
                $('.ajaxHolder').html(data.html);
                $('.ajaxStats-first').html(data.from || 0);
                $('.ajaxStats-last').html(data.to || 0);
                $('.ajaxStats-total').html(data.total || 0);
                $('.ajaxStats-page').html(data.current_page || 1);
                location.hash = hash;
            }).fail(function () {
                console.log("concepts could not be loaded through ajax");
            });
        }

        // Allows for a small delay before getting concepts when searching
        // This to minimize the network load
        // The ajax request will fire 200ms after the user stops giving input
        $("#query").on("input", function () {
            delay(function () {
                getConcepts(1, $("#query").val(), $("input:radio[id^='sortName']:checked").attr('id'));
            }, 200);
        });

        // Allows for sorting
        $(document).on('change', 'input:radio[id^="sortName"]', function (event) {
            getConcepts(window.location.hash.substr(1) || 1, $("#query").val(), $("input:radio[id^='sortName']:checked").attr('id'));
        });
    </script>
@endsection