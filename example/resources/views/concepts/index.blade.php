@extends('layouts.app')
@section('title', 'Alle begrippen')

@section('info')
    <p>
        @if($concepts->count() >= 1)
            Resultaat {{$concepts->firstItem()}} - {{$concepts->firstItem() + $concepts->count() - 1}}
            van {{\App\Concept::all()->count()}} begrippen
        @else
            Geen resultaat
        @endif
    </p>
@endsection

@section('content')

    @component('components.concepts.sort',
        ['withTitle' => true,
        'withHr' => true])
    @endcomponent

    @component('components.concepts.searchbar',
        ['inline' => true,
        'withSubmit' => true,
        'submitText' => 'Alle begrippen doorzoeken'])
    @endcomponent

    @yield('info')
    {{$concepts->links('vendor.pagination.bootstrap-4')}}

    @component('components.accordion')
        @foreach($concepts as $concept)
            @component('components.accordioncard-concept')
                @slot('concept', $concept)
            @endcomponent
        @endforeach
    @endcomponent

    {{$concepts->links('vendor.pagination.bootstrap-4')}}
    @yield('info')

@endsection

@section('scripts')
    <script>
        $("#query").on("keyup", function() {
            let value = $(this).val();

            $(".card").each(function(index) {
                if (index >= 0)
                {
                    let text = $(this).find(".card-header:first").text().trim();
                    if (text !== "")
                    {
                        if (text.indexOf(value) >= 0)
                        {
                            $(this).show();
                        }
                        else
                        {
                            $(this).hide();
                        }
                    }
                }
            });
        });
    </script>
@endsection