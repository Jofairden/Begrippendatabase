@extends('layouts.master')
@section('title', 'View terms')
@section('styles')
    <style>
        div.term {
            background-color: rgba(236, 255, 117, 0.25);
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        ul li {
            display: inline;
        }
    </style>
@endsection


@section('content')
    <div class="helpers">
        <a href="/terms/fsthalf">
            View first half
        </a>
        <br>
        <a href="/terms/lsthalf">
            View last half
        </a>
        <br>
        <br>
        <a href="/terms/create">
            Add a new term
        </a>
    </div>

    <hr>
    <p>
        Showing {{$terms->count()}} of {{$terms->total()}} terms on page {{$terms->currentPage()}}
        (max {{$terms->perPage()}} per page)
    </p>
    <div class="paginator">
        {{ $terms->links() }}
    </div>
    <div class="terms-container">
        @foreach($terms as $term)
            <div class="term">
                <h4><a href="/term/{{$term->id}}">{{ $term->name }}</a></h4>
                <p>On {{$term->created_at}}</p>
                <span>
                    {{ $term->description }}
                </span>
            </div>
            <hr>
        @endforeach
    </div>
    <div class="paginator">
        {{ $terms->links() }}
    </div>
    <p>
        Showing {{$terms->count()}} of {{$terms->total()}} terms on page {{$terms->currentPage()}}
        (max {{$terms->perPage()}} per page)
    </p>
@endsection