@section('pagination')
    <div class="row col-12 justify-content-center">
        {{$concepts->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4')}}
    </div>
@endsection

@yield('pagination')
@component('components.accordion')
    @foreach($concepts as $concept)
        @component('components.accordioncard-concept',
            ['concept' => $concept])
        @endcomponent
    @endforeach
@endcomponent
@yield('pagination')

